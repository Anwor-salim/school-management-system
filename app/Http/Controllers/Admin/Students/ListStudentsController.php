<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListStudentsController extends Controller
{
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $students = Student::with('user')
            ->when($request->class_id, fn($q) => $q->where('class_id', $request->class_id))
            ->when($request->section_id, fn($q) => $q->where('section_id', $request->section_id))
            ->latest()
            ->paginate($request->per_page ?? 15);

        return UserResource::collection(
            $students->through(fn($student) => $student->user)
        );
    }
}
