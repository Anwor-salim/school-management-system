<?php

namespace App\Http\Controllers\Admin\Subjects;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListSubjectsController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $subjects = Subject::latest()->paginate($request->per_page ?? 15);

        return response()->json($subjects);
    }
}
