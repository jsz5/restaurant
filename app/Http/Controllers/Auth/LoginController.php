<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
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
//        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
//            $token= JWTAuth::fromUser(Auth::user());
//            $response = new Response([
//                'msg'=>"Pomyślnie zalogowałeś się do systemu",
//                 'token' => $token]);
//            return $response->withCookie(cookie('token', $token));;
//        }else{
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }
//
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'))
            ->withCookie(cookie('token', $token));
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return void
     */
    public function logout()
    {
        \Cookie::queue(\Cookie::forget('token'));
        \Cookie::queue(\Cookie::forget('jwt-token'));
        \Auth::logout();
    }
}
