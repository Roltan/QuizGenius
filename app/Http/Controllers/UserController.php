<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegRequest;
use App\Services\AuthServices;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        public AuthServices $authServices
    ) {}

    public function login(LoginRequest $loginRequest): Response|ResponseFactory
    {
        return $this->authServices->login($loginRequest);
    }

    public function logout(): Response|ResponseFactory
    {
        return $this->authServices->logout();
    }

    public function register(RegRequest $regRequest): Response|ResponseFactory
    {
        return $this->authServices->register($regRequest);
    }
}
