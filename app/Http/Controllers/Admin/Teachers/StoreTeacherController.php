<?php

namespace App\Http\Controllers\Admin\Teachers;

use App\Http\Controllers\Controller;
use App\Actions\Admin\Teachers\RegisterTeacherAction;
use App\DTO\Admin\Teachers\RegisterTeacherDTO;
use App\Http\Requests\Admin\Teachers\RegisterTeacherRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class StoreTeacherController extends Controller
{
    public function __invoke(RegisterTeacherRequest $request, RegisterTeacherAction $action): JsonResponse
    {
        $user = $action->execute(RegisterTeacherDTO::fromRequest($request));

        return response()->json([
            'message' => 'Teacher registered successfully',
            'data' => new UserResource($user->load('teacher')),
        ], 201);
    }
}
