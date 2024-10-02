<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegRequest;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthServices
{
    public function login(LoginRequest $request): Response|ResponseFactory
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request['password']
        ];

        if (!Auth::validate($credentials)) {
            return response(['status' => false, 'error' => 'invalid data'], 400);
        }

        // вход
        Auth::login(Auth::getProvider()->retrieveByCredentials($credentials));

        return response(['status' => true], 200);
    }

    public function logout(): Response|ResponseFactory
    {
        if (Auth::user() == null)
            return response(['status' => false, 'error' => 'You are not logged in']);
        Auth::logout();
        return response(['status' => true], 200);
    }

    public function register(RegRequest $request): Response|ResponseFactory
    {
        $user = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
        ]);

        Auth::login($user);
        return response(['status' => true], 200);
    }
}
