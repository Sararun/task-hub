<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    final public function login(LoginRequest $request): JsonResponse
    {

        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'User successfully authorized']);
        }
        return response()->json(status: Response::HTTP_SERVICE_UNAVAILABLE);
    }

    final public function register(RegisterRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        User::create($credentials);

        return response()->json(['message' => 'User successfully registered']);
    }

    final public function logOut(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json();
    }
}
