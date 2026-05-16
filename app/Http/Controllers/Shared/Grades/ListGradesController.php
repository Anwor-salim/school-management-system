<?php

namespace App\Http\Controllers\Shared\Grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListGradesController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $grades = Grade::with(['student.user', 'exam.subject'])
            ->when($request->student_id, fn($q) => $q->where('student_id', $request->student_id))
            ->when($request->exam_id, fn($q) => $q->where('exam_id', $request->exam_id))
            ->latest()
            ->paginate($request->per_page ?? 15);

        return response()->json($grades);
    }
}
