<?php

namespace App\Actions\Shared\Auth;

use App\Models\User;
use App\DTO\Shared\Auth\LoginDTO;
use App\Enums\UserStatus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginAction
{
    public function execute(LoginDTO $data): array
    {
        $user = User::where('email', $data->email)->first();

        if (!$user || !Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')],
            ]);
        }

        if ($user->status === UserStatus::INACTIVE) {
            throw ValidationException::withMessages([
                'email' => ['Your account is inactive.'],
            ]);
        }

        $user->update(['last_login_at' => now()]);
        
        $token = $user->createToken($data->deviceName ?? 'api-token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
