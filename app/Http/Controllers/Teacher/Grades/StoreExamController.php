<?php

namespace App\Http\Controllers\Teacher\Grades;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreExamController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'date' => ['required', 'date'],
            'total_marks' => ['required', 'integer', 'min:1'],
        ]);

        $exam = Exam::create($request->only('name', 'subject_id', 'date', 'total_marks'));

        return response()->json([
            'message' => 'Exam created successfully',
            'data' => $exam->load('subject'),
        ], 201);
    }
}
