<?php

namespace App\Http\Middleware;

use App\Models\LDAPUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtHandler
{
    /**
     * Put token to session
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $user = Auth::user();

        if ($user !== null) {
            $token = JWTAuth::fromUser($user);
            $token = JWTAuth::refresh(JWTAuth::setToken($token));
            session()->put('token', $token);
        }

        return $response;
    }
}
