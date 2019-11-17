<?php

namespace App\Http\Controllers;

class DishCategoryController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dishCategory.index');
    }
}
