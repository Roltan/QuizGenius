<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthChecked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tg_id = $request->cookie('tg-id');
        if ($tg_id) {
            $user = User::query()
                ->where('tg_id', $tg_id)
                ->first();

            if ($user == null) {
                $user = User::create([
                    'name' => $request->cookie('user_name'),
                    'tg_id' => $tg_id
                ]);
            }

            if (!Auth::check())
                Auth::login($user);
        }

        if (!Auth::check()) {
            return response([
                'status' => false,
                'error' => 'you are not logged in'
            ], 403);
        }

        return $next($request);
    }
}
