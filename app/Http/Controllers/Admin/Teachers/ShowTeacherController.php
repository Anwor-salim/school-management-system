<?php

namespace App\Http\Controllers\Admin\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class ShowTeacherController extends Controller
{
    public function __invoke(Teacher $teacher): JsonResponse
    {
        return response()->json([
            'data' => new UserResource($teacher->user->load('teacher')),
        ]);
    }
}
