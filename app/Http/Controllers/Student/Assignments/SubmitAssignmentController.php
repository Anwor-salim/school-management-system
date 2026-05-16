<?php

namespace App\Http\Controllers\Student\Assignments;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubmitAssignmentController extends Controller
{
    public function __invoke(Request $request, Assignment $assignment): JsonResponse
    {
        $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'content' => ['required', 'string'],
        ]);

        $submission = Submission::updateOrCreate(
            [
                'assignment_id' => $assignment->id,
                'student_id' => $request->student_id,
            ],
            [
                'content' => $request->content,
                'status' => now()->gt($assignment->due_date) ? 'late' : 'submitted',
            ]
        );

        return response()->json([
            'message' => 'Assignment submitted successfully',
            'data' => $submission,
        ]);
    }
}
