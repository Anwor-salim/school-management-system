<?php

namespace App\DTO\Admin\Teachers;

use Illuminate\Http\Request;

class RegisterTeacherDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $employeeId,
        public readonly ?string $joiningDate,
        public readonly ?string $specialization,
        public readonly ?string $bio,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            employeeId: $request->validated('employee_id'),
            joiningDate: $request->validated('joining_date'),
            specialization: $request->validated('specialization'),
            bio: $request->validated('bio'),
        );
    }
}
