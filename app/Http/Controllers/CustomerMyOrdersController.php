<?php

namespace App\Http\Controllers;

class CustomerMyOrdersController extends Controller
{
    /**
     * Show form for all orders ordered by currently logged user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('orders.customerMyOrders');
    }
}
