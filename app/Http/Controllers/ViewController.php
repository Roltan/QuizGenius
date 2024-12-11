<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegRequest;
use App\Http\Resources\Card\SolvedResource;
use App\Models\SolvedTest;
use App\Models\Test;
use App\Services\AuthServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function viewProfile(): View
    {
        $user = Auth::user();
        if ($user === null)
            return view('index');
        return view('profile', [
            'name' => $user->name,
            'email' => $user->email
        ]);
    }

    public function viewSolved()
    {
        $user = Auth::user();
        if ($user === null)
            return view('index');

        $tests = Test::query()
            ->where('user_id', $user->id)
            ->get()
            ->pluck('title');

        $solvedTest = SolvedTest::query()
            ->where('user_id', $user->id)
            ->get();

        return view('profile-solved', [
            'tests' => $tests,
            'cards' => json_decode(json_encode(SolvedResource::collection($solvedTest)), true)
        ]);
    }
}
