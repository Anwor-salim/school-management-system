<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreClassController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'level' => ['required', 'integer'],
        ]);

        $class = SchoolClass::create($request->only('name', 'level'));

        return response()->json([
            'message' => 'Class created successfully',
            'data' => $class,
        ], 201);
    }
}
