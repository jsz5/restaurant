<?php

namespace App\Http\Controllers;

use App\Models\Table;

class TableController extends Controller
{


    /**
     * Show form for all tables in restaurant
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('tables/index');
    }


    /**
     * Show form for edit specific table
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $table = Table::find($id);
        return view('tables/edit', compact(['table', 'id']));
    }


    /**
     * Show form for display specific table for admin
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $table = Table::find($id);
        return view('tables/show', compact(['table', 'id']));
    }


    /**
     * Show form for display tables for currently logged waiter
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWaiter($id)
    {
        return view('tables/waiterShow',compact(["id"]));
    }


    /**
     *
     * Show form of all tables for currently logged waiter
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function waiterIndex()
    {
        return view('tables/waiterIndex');
    }
}
