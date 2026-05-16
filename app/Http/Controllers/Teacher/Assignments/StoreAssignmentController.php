<?php

namespace App\Http\Controllers\Teacher\Assignments;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreAssignmentController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'section_id' => ['required', 'exists:sections,id'],
            'due_date' => ['required', 'date', 'after:today'],
        ]);

        $assignment = Assignment::create($request->only(
            'title', 'description', 'subject_id', 'teacher_id', 'section_id', 'due_date'
        ));

        return response()->json([
            'message' => 'Assignment created successfully',
            'data' => $assignment->load(['subject', 'teacher.user', 'section']),
        ], 201);
    }
}
