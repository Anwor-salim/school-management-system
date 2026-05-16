<?php

namespace App\Http\Controllers\Teacher\Attendance;

use App\Http\Controllers\Controller;
use App\Actions\Teacher\Attendance\MarkBulkAttendanceAction;
use App\Enums\AttendanceStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class MarkAttendanceController extends Controller
{
    public function __invoke(Request $request, MarkBulkAttendanceAction $action): JsonResponse
    {
        $request->validate([
            'section_id' => ['required', 'exists:sections,id'],
            'date' => ['required', 'date'],
            'records' => ['required', 'array', 'min:1'],
            'records.*.student_id' => ['required', 'exists:students,id'],
            'records.*.status' => ['required', new Enum(AttendanceStatus::class)],
            'records.*.remarks' => ['nullable', 'string'],
        ]);

        $count = $action->execute(
            $request->section_id,
            $request->date,
            $request->records,
        );

        return response()->json([
            'message' => "Attendance marked for {$count} students",
        ]);
    }
}
