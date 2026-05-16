<?php

namespace App\Http\Requests\Admin\Teachers;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;

class RegisterTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->role === UserRole::ADMIN;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'employee_id' => ['required', 'string', 'unique:teachers,employee_id'],
            'joining_date' => ['nullable', 'date'],
            'specialization' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
        ];
    }
}
