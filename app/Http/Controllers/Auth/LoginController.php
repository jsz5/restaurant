<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            $response = new Response([
                'token' =>JWTAuth::fromUser(Auth::user()),
                'type' => 'bearer', // you can ommit this
                'expires' => auth('api')->factory()->getTTL() * 60, // time to expiration

            ]);
            $response->withCookie(cookie('jwt_token', JWTAuth::fromUser(Auth::user())));
            return $response;
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return void
     */
    public function logout()
    {
        \Auth::logout();
    }
}
