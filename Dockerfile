FROM php:8.2-apache

# 1. Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Install PHP extensions
# (tokenizer, ctype are included by default in the php image)
RUN docker-php-ext-install pdo_mysql mbstring bcmath xml fileinfo

# Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# 3. Change Apache document root to Laravel's public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Set working directory
WORKDIR /var/www/html

# 5. Copy composer from official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Copy the entire project
COPY . .

# 7. Install composer dependencies
RUN composer install --no-dev --optimize-autoloader

# 8. Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Cache Laravel configurations
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# 10. Configure Apache to listen on Render's $PORT
# We must do this at runtime (CMD) because $PORT is set by Render when the container starts.
ENV PORT=8000
CMD sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf \
    && sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:${PORT}>/" /etc/apache2/sites-available/000-default.conf \
    && apache2-foreground
