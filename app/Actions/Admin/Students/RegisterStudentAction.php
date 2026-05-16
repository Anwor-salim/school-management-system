<?php

namespace App\Actions\Admin\Students;

use App\Models\User;
use App\DTO\Admin\Students\RegisterStudentDTO;
use App\Enums\UserRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterStudentAction
{
    public function execute(RegisterStudentDTO $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => Hash::make('password'), // Default password
                'role' => UserRole::STUDENT,
            ]);

            $user->student()->create([
                'registration_number' => $data->registrationNumber,
                'class_id' => $data->classId,
                'section_id' => $data->sectionId,
                'date_of_birth' => $data->dateOfBirth,
                'address' => $data->address,
                'parent_name' => $data->parentName,
                'parent_contact' => $data->parentContact,
            ]);

            return $user;
        });
    }
}
