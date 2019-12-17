<?php

namespace App\Http\Controllers;

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

    public function listCustomerVouchers()
    {
        return view('vouchers/customerIndex');
    }
}
