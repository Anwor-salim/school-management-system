<?php

namespace App\DTO\Shared\Auth;

use Illuminate\Http\Request;

class LoginDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly ?string $deviceName = null,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            email: $request->validated('email'),
            password: $request->validated('password'),
            deviceName: $request->header('User-Agent', 'unknown'),
        );
    }
}
