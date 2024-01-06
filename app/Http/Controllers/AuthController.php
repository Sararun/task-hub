<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Interfaces\Requests\LoginRequestInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    final public function login(LoginRequestInterface $request): JsonResponse
    {
        $credentials = $request->validated();

        Auth::attempt($credentials);

        $user = User::firstWhere('email', $credentials['email']);

        return response()->json(
            [
                'message' => 'User successfully authorized.',
                'token' => $user->createToken('API TOKEN')->plainTextToken
            ]
        );
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

        $request->user()->currentAccessToken()->delete();

        return response()->json();
    }
}
