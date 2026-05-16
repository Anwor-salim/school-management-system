<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use App\Actions\Admin\Students\RegisterStudentAction;
use App\DTO\Admin\Students\RegisterStudentDTO;
use App\Http\Requests\Admin\Students\RegisterStudentRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class StoreStudentController extends Controller
{
    public function __invoke(RegisterStudentRequest $request, RegisterStudentAction $action): JsonResponse
    {
        $user = $action->execute(RegisterStudentDTO::fromRequest($request));

        return response()->json([
            'message' => 'Student registered successfully',
            'data' => new UserResource($user->load('student')),
        ], 201);
    }
}
