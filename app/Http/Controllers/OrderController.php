<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\Order;
use App\Services\DishService;

class OrderController extends Controller
{
    /**
     * Show form for create order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createOrder()
    {
        $categories = DishCategory::all();
        $dishes = (new DishService())->dishWithFavourite(Dish::all()->load('category'));
        return view('orders.customerOrder', compact('dishes', 'categories'));
    }


    /**
     * Show form of all orders for currently logged waiter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('order/waiterIndex');
    }


    /**
     * Show form for create order by waiter
     * @param $tableId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createWaiterOrder($tableId)
    {
        return view('order/createWaiter', compact(['tableId']));
    }


    /**
     * Show form for display specific order
     * @param $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($token)
    {
        return view('order/show', compact(['token']));
    }


    /**
     * Show form for edit specific order
     * @param $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editWaiter($token)
    {
        $order = Order::where('token', $token)->first();
        $status = $order->status;
        return view('order/editWaiter', compact(['token', 'status']));
    }

}
