<?php

use App\Http\Controllers\Student\Assignments\SubmitAssignmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // ─── Assignments & Submissions ──────────────────────────────
    Route::post('/assignments/{assignment}/submit', SubmitAssignmentController::class);
});
