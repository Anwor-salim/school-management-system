<?php

use App\Http\Controllers\Shared\Auth\LoginController;
use App\Http\Controllers\Shared\Auth\LogoutController;
use App\Http\Controllers\Shared\Attendance\ListAttendanceController;
use App\Http\Controllers\Shared\Grades\ListGradesController;
use App\Http\Controllers\Shared\Assignments\ListAssignmentsController;
use Illuminate\Support\Facades\Route;

// ─── Auth ────────────────────────────────────────────────────────
Route::post('/auth/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', LogoutController::class);

    // ─── Shared Read Endpoints ───────────────────────────────────
    Route::get('/attendance', ListAttendanceController::class);
    Route::get('/grades', ListGradesController::class);
    Route::get('/assignments', ListAssignmentsController::class);
});
