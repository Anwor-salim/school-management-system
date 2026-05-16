<?php

namespace App\Http\Controllers\Admin\Subjects;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssignTeacherToSubjectController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'subject_id' => ['required', 'exists:subjects,id'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'section_id' => ['required', 'exists:sections,id'],
        ]);

        $subject = Subject::findOrFail($request->subject_id);
        $subject->teachers()->attach($request->teacher_id, [
            'section_id' => $request->section_id,
        ]);

        return response()->json([
            'message' => 'Teacher assigned to subject successfully',
        ]);
    }
}
