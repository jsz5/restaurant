<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add()
    {
        return view('vouchers/admin-add');
    }
}
