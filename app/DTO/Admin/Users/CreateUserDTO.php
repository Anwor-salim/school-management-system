<?php

namespace App\DTO\Admin\Users;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Http\Request;

class CreateUserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly UserRole $role,
        public readonly UserStatus $status = UserStatus::ACTIVE,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: $request->validated('password'),
            role: UserRole::from($request->validated('role')),
            status: $request->has('status') ? UserStatus::from($request->validated('status')) : UserStatus::ACTIVE,
        );
    }
}
