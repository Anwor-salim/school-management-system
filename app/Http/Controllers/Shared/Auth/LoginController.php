<?php

namespace App\Http\Controllers\Shared\Auth;

use App\Http\Controllers\Controller;
use App\Actions\Shared\Auth\LoginAction;
use App\DTO\Shared\Auth\LoginDTO;
use App\Http\Requests\Shared\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, LoginAction $action): JsonResponse
    {
        $result = $action->execute(LoginDTO::fromRequest($request));

        return response()->json([
            'message' => 'Login successful',
            'data' => [
                'user' => new UserResource($result['user']),
                'token' => $result['token'],
            ],
        ]);
    }
}
