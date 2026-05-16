<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\JsonResponse;

class ShowClassController extends Controller
{
    public function __invoke(SchoolClass $class): JsonResponse
    {
        return response()->json([
            'data' => $class->load('sections'),
        ]);
    }
}
