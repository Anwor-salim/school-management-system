<?php

use App\Http\Controllers\Admin\Users\ListUsersController;
use App\Http\Controllers\Admin\Users\StoreUserController;
use App\Http\Controllers\Admin\Students\ListStudentsController;
use App\Http\Controllers\Admin\Students\ShowStudentController;
use App\Http\Controllers\Admin\Students\StoreStudentController;
use App\Http\Controllers\Admin\Students\DeleteStudentController;
use App\Http\Controllers\Admin\Teachers\ListTeachersController;
use App\Http\Controllers\Admin\Teachers\ShowTeacherController;
use App\Http\Controllers\Admin\Teachers\StoreTeacherController;
use App\Http\Controllers\Admin\Classes\ListClassesController;
use App\Http\Controllers\Admin\Classes\ShowClassController;
use App\Http\Controllers\Admin\Classes\StoreClassController;
use App\Http\Controllers\Admin\Classes\StoreSectionController;
use App\Http\Controllers\Admin\Subjects\ListSubjectsController;
use App\Http\Controllers\Admin\Subjects\StoreSubjectController;
use App\Http\Controllers\Admin\Subjects\AssignTeacherToSubjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // ─── Users (Admin) ──────────────────────────────────────────
    Route::get('/users', ListUsersController::class);
    Route::post('/users', StoreUserController::class);

    // ─── Students ───────────────────────────────────────────────
    Route::get('/students', ListStudentsController::class);
    Route::get('/students/{student}', ShowStudentController::class);
    Route::post('/students', StoreStudentController::class);
    Route::delete('/students/{student}', DeleteStudentController::class);

    // ─── Teachers ───────────────────────────────────────────────
    Route::get('/teachers', ListTeachersController::class);
    Route::get('/teachers/{teacher}', ShowTeacherController::class);
    Route::post('/teachers', StoreTeacherController::class);

    // ─── Classes & Sections ─────────────────────────────────────
    Route::get('/classes', ListClassesController::class);
    Route::get('/classes/{class}', ShowClassController::class);
    Route::post('/classes', StoreClassController::class);
    Route::post('/sections', StoreSectionController::class);

    // ─── Subjects ───────────────────────────────────────────────
    Route::get('/subjects', ListSubjectsController::class);
    Route::post('/subjects', StoreSubjectController::class);
    Route::post('/subjects/assign-teacher', AssignTeacherToSubjectController::class);
});
