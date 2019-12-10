<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Tymon\JWTAuth\Facades\JWTAuth;


class JwtHandler
{
    /**
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
            $response->headers->set('Authorization', 'Bearer '.$token);
            $cookie=Cookie::make("token",$token,1, null, null, false, false);
            $response->withCookie($cookie);
        }
        

        return $response;
    }
}
