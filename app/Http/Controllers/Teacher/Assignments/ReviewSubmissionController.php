<?php

namespace App\Http\Controllers\Teacher\Assignments;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewSubmissionController extends Controller
{
    public function __invoke(Request $request, Submission $submission): JsonResponse
    {
        $request->validate([
            'score' => ['required', 'numeric', 'min:0'],
            'feedback' => ['nullable', 'string'],
        ]);

        $submission->update([
            'score' => $request->score,
            'feedback' => $request->feedback,
            'status' => 'graded',
        ]);

        return response()->json([
            'message' => 'Submission reviewed successfully',
            'data' => $submission->load(['student.user', 'assignment']),
        ]);
    }
}
