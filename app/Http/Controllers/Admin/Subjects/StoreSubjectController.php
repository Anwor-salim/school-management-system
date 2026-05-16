<?php

namespace App\Http\Controllers\Admin\Subjects;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreSubjectController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'unique:subjects,code'],
            'description' => ['nullable', 'string'],
        ]);

        $subject = Subject::create($request->only('name', 'code', 'description'));

        return response()->json([
            'message' => 'Subject created successfully',
            'data' => $subject,
        ], 201);
    }
}
