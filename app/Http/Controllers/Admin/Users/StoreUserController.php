<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Actions\Admin\Users\CreateUserAction;
use App\DTO\Admin\Users\CreateUserDTO;
use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class StoreUserController extends Controller
{
    public function __invoke(CreateUserRequest $request, CreateUserAction $action): JsonResponse
    {
        $user = $action->execute(CreateUserDTO::fromRequest($request));

        return response()->json([
            'message' => 'User created successfully',
            'data' => new UserResource($user),
        ], 201);
    }
}
