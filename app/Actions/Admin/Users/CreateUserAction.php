<?php

namespace App\Actions\Admin\Users;

use App\Models\User;
use App\DTO\Admin\Users\CreateUserDTO;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function execute(CreateUserDTO $data): User
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'role' => $data->role,
            'status' => $data->status,
        ]);
    }
}
