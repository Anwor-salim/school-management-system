<?php

namespace App\Http\Controllers\Shared\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListAttendanceController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'section_id' => ['required', 'exists:sections,id'],
            'date' => ['nullable', 'date'],
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date'],
        ]);

        $attendance = Attendance::with('student.user')
            ->where('section_id', $request->section_id)
            ->when($request->date, fn($q) => $q->where('date', $request->date))
            ->when($request->from, fn($q) => $q->where('date', '>=', $request->from))
            ->when($request->to, fn($q) => $q->where('date', '<=', $request->to))
            ->latest('date')
            ->paginate($request->per_page ?? 15);

        return response()->json($attendance);
    }
}
