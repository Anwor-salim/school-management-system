<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class ShowStudentController extends Controller
{
    public function __invoke(Student $student): JsonResponse
    {
        return response()->json([
            'data' => new UserResource($student->user->load('student')),
        ]);
    }
}
