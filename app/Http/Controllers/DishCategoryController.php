<?php

namespace App\Http\Controllers;

class DishCategoryController extends Controller
{


    /**
     * Show form for all dish categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('dishCategory.index');
    }
}
