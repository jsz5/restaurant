<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishCategory;
use App\Services\DishService;
use Illuminate\View\View;

class DishController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the restaurant menuLayouts for customer
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menu()
    {
        $categories = DishCategory::all();
        $dishes = (new DishService)->dishWithFavourite(Dish::all()->load('category'));
        return view('menuLayouts/menu', compact('dishes', 'categories'));
    }


    /**
     * Show the restaurant menuLayouts for admin
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminMenu()
    {
        return view('menuLayouts/adminMenu');
    }

    /**
     * Show the form for editing the dish
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        return view('dish/edit', compact(['dish', 'id']));
    }

    /**
     * Show the form for create dish
     *
     * @return View
     */
    public function create()
    {
        return view('dish.create');
    }
}
