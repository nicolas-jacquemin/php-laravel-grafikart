<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function me (Request $request): JsonResponse {
        $user = $request->user();
        return response()->json($user);
    }
}
