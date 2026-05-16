<?php

namespace App\Http\Controllers\Teacher\Grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordGradesController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'exam_id' => ['required', 'exists:exams,id'],
            'grades' => ['required', 'array', 'min:1'],
            'grades.*.student_id' => ['required', 'exists:students,id'],
            'grades.*.score' => ['required', 'numeric', 'min:0'],
            'grades.*.remarks' => ['nullable', 'string'],
        ]);

        DB::transaction(function () use ($request) {
            foreach ($request->grades as $gradeData) {
                Grade::updateOrCreate(
                    [
                        'student_id' => $gradeData['student_id'],
                        'exam_id' => $request->exam_id,
                    ],
                    [
                        'score' => $gradeData['score'],
                        'remarks' => $gradeData['remarks'] ?? null,
                    ]
                );
            }
        });

        return response()->json([
            'message' => 'Grades recorded successfully',
        ]);
    }
}
