<?php

namespace App\Http\Controllers;

class VoucherController extends Controller
{


    /**
     * Show form for create new vouchers
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('vouchers/admin-add');
    }

    /**
     * Show form of all vouchers for currently logged user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listCustomerVouchers()
    {
        return view('vouchers/customerIndex');
    }
}
