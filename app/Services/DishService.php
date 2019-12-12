<?php


namespace App\Services;


use App\Models\FavouriteDish;
use Illuminate\Support\Facades\Auth;

class DishService
{
    /**
     * @param $dishes
     * @return array
     */
    public function dishWithFavourite($dishes)
    {
        if (Auth::user()){
            $favouriteDishArray = FavouriteDish::where('user_id', Auth::id())->pluck('dish_id')->toArray();
            foreach ($dishes as $dish) {
                $dish['isFavourite'] = in_array($dish->id, $favouriteDishArray) ? true : false;
            }
        }
        return $dishes;
    }


    /**
     * @param $dishes
     * @return array
     */
    public function dishOnlyFavourite($dishes)
    {
        if (Auth::user()){
            $arr = [];
            $favouriteDishArray = FavouriteDish::where('user_id', Auth::id())->pluck('dish_id')->toArray();
            foreach ($dishes as $dish) {
                if(in_array($dish->id, $favouriteDishArray)){
                    array_push($arr,$dish);
                }
            }
        }
        return $arr;
    }
}