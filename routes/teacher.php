<?php

use App\Http\Controllers\Teacher\Attendance\MarkAttendanceController;
use App\Http\Controllers\Teacher\Grades\StoreExamController;
use App\Http\Controllers\Teacher\Grades\RecordGradesController;
use App\Http\Controllers\Teacher\Assignments\StoreAssignmentController;
use App\Http\Controllers\Teacher\Assignments\ReviewSubmissionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // ─── Attendance ─────────────────────────────────────────────
    Route::post('/attendance', MarkAttendanceController::class);

    // ─── Exams & Grades ─────────────────────────────────────────
    Route::post('/exams', StoreExamController::class);
    Route::post('/grades', RecordGradesController::class);

    // ─── Assignments & Submissions ──────────────────────────────
    Route::post('/assignments', StoreAssignmentController::class);
    Route::put('/submissions/{submission}/review', ReviewSubmissionController::class);
});
