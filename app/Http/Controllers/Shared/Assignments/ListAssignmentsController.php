<?php

namespace App\Http\Controllers\Shared\Assignments;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListAssignmentsController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $assignments = Assignment::with(['subject', 'teacher.user', 'section.schoolClass'])
            ->when($request->section_id, fn($q) => $q->where('section_id', $request->section_id))
            ->when($request->subject_id, fn($q) => $q->where('subject_id', $request->subject_id))
            ->when($request->teacher_id, fn($q) => $q->where('teacher_id', $request->teacher_id))
            ->latest()
            ->paginate($request->per_page ?? 15);

        return response()->json($assignments);
    }
}
