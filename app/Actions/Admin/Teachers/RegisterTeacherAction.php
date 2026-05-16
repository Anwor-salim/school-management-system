<?php

namespace App\Actions\Admin\Teachers;

use App\Models\User;
use App\DTO\Admin\Teachers\RegisterTeacherDTO;
use App\Enums\UserRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterTeacherAction
{
    public function execute(RegisterTeacherDTO $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => Hash::make('password'), // Default password
                'role' => UserRole::TEACHER,
            ]);

            $user->teacher()->create([
                'employee_id' => $data->employeeId,
                'joining_date' => $data->joiningDate,
                'specialization' => $data->specialization,
                'bio' => $data->bio,
            ]);

            return $user;
        });
    }
}
