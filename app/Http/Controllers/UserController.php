<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    /**
     * Show form for display my account for currently logged user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myAccount(){
        return view('users/myAccount');
    }
}