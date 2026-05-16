<?php

namespace App\Http\Controllers\Admin\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListTeachersController extends Controller
{
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $teachers = Teacher::with('user')
            ->latest()
            ->paginate($request->per_page ?? 15);

        return UserResource::collection(
            $teachers->through(fn($teacher) => $teacher->user->setRelation('teacher', $teacher))
        );
    }
}
