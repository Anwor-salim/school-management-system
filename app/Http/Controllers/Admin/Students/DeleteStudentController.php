<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class DeleteStudentController extends Controller
{
    public function __invoke(Student $student): JsonResponse
    {
        $student->user()->delete(); // Cascades to student profile

        return response()->json([
            'message' => 'Student deleted successfully',
        ]);
    }
}
