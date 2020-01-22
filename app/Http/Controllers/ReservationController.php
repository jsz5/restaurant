<?php

namespace App\Http\Controllers;

class ReservationController extends Controller
{

    /**
     *  Show form contains all reservations for currently logged waiter
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('reservations/indexWaiter');
    }


    /**
     * Show form t create reservation by waiter
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('reservations/createWaiter');
    }


    /**
     * Show form for display information about specific reservation for user
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUser($id)
    {
        return view('reservations.showUser', ['id' => $id]);
    }


    /**
     * Show form for display information about specific reservation for waiter
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWaiter($id)
    {
        return view('reservations.showUser', ['id' => $id]);
    }


    /**
     * Show form of all currently logged user reservations
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexUser()
    {
        return view('reservations/indexUser');
    }


    /**
     * Show form for create reservation by user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createUser()
    {
        return view('reservations/createUser');
    }

}
