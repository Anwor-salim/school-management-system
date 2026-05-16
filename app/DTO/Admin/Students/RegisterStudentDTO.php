<?php

namespace App\DTO\Admin\Students;

use Illuminate\Http\Request;

class RegisterStudentDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $registrationNumber,
        public readonly ?int $classId,
        public readonly ?int $sectionId,
        public readonly ?string $dateOfBirth,
        public readonly ?string $address,
        public readonly ?string $parentName,
        public readonly ?string $parentContact,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            registrationNumber: $request->validated('registration_number'),
            classId: $request->validated('class_id'),
            sectionId: $request->validated('section_id'),
            dateOfBirth: $request->validated('date_of_birth'),
            address: $request->validated('address'),
            parentName: $request->validated('parent_name'),
            parentContact: $request->validated('parent_contact'),
        );
    }
}
