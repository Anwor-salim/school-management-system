<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ListClassesController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $classes = SchoolClass::with('sections')
            ->latest()
            ->paginate($request->per_page ?? 15);

        return response()->json($classes);
    }
}
