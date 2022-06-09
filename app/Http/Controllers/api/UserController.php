<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(StoreUserRequest $request)
    {

        $userData = $request->only('name', 'email', 'password');

        $user = User::create($userData);

        $token = $user->createToken('todo_app_access_token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }


    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
