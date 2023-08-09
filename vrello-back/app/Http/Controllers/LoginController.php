<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function attemptLogin (LoginRequest $request): JsonResponse {
        if (\Auth::attempt($request->validated())) {
            $token = $request->user()->createToken('vrello');

            return response()->json(['token' => $token->plainTextToken]);
        } else {
            return response()->json(['message' => 'Invalid Credentials.'], 401);
        }
    }

    public function logout (Request $request): JsonResponse {
        $request->user()->currentAccessToken()->delete();
        return response()->json();
    }
}
