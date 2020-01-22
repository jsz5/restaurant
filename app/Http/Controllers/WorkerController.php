<?php

namespace App\Http\Controllers;

class WorkerController extends Controller
{
    /**
     * Show form of all waiters for admin
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('workers.index');
    }

    /**
     * Show form for edit specific waiter
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        return view('workers.edit', [
            'id' => $id
        ]);
    }

    /**
     * Show form for create waiter
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('workers.create');
    }
}
