<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreSectionController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'class_id' => ['required', 'exists:classes,id'],
            'name' => ['required', 'string', 'max:10'],
            'capacity' => ['nullable', 'integer', 'min:1'],
        ]);

        $section = Section::create($request->only('class_id', 'name', 'capacity'));

        return response()->json([
            'message' => 'Section created successfully',
            'data' => $section->load('schoolClass'),
        ], 201);
    }
}
