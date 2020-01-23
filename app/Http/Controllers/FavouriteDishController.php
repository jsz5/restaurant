<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FavouriteDishController extends Controller
{


    /**
     * Show the form for favourite dishes list.
     *
     * @return View
     */
    public function index()
    {
        return view('dish/userFavouriteDishes');
    }
}
