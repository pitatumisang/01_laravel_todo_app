<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogInUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LogInUserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response([
                'message' => 'Incorrect credentials',
                401
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken('todo_app_access_token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token

        ], 201);
    }

    public function logout(Request $request)
    {
        // auth()->user()->tokens()->delete();

        return response([
            'message' => 'Log Out'
        ]);
    }
}
