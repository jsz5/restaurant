<?php


namespace App\Services;


use App\Models\Dish;
use App\Models\FavouriteDish;
use Illuminate\Support\Facades\Auth;

class DishService
{
    /**
     * Load dishes with flag if dish is favourite
     * @param $dishes
     * @return array
     */
    public function dishWithFavourite($dishes): array
    {
        $dishesArray = [];
        foreach ($dishes as $dish) {
            $dishArray = [];
            $path = null;
            if ($dish->photo) {
                $path = url('storage' . $dish->photo->path);
            }
            $dishArray['id'] = $dish->id;
            $dishArray['name'] = $dish->name;
            $dishArray['price'] = $dish->price;
            $dishArray['category'] = $dish->category;
            $dishArray['comment'] = $dish->comment;
            $dishArray['photoPath'] = $path;
            if (Auth::user()) {
                $favouriteDishArray = FavouriteDish::where('user_id', Auth::id())->pluck('dish_id')->toArray();
                $dishArray['isFavourite'] = in_array($dish->id, $favouriteDishArray) ? true : false;
            }
            array_push($dishesArray, $dishArray);
        }
        return $dishesArray;
    }


    /**
     * Load only favourite dish
     * @param $dishes
     * @return array
     */
    public function dishOnlyFavourite($dishes)
    {
        $arr = [];
        if (Auth::user()) {
            $favouriteDishArray = FavouriteDish::where('user_id', Auth::id())->pluck('dish_id')->toArray();
            foreach ($dishes as $dish) {
                if (in_array($dish->id, $favouriteDishArray)) {
                    $dishArray = [];
                    $path = null;
                    if ($dish->photo) {
                        $path = url('storage' . $dish->photo->path);
                    }
                    $dishArray['id'] = $dish->id;
                    $dishArray['name'] = $dish->name;
                    $dishArray['price'] = $dish->price;
                    $dishArray['comment'] = $dish->comment;
                    $dishArray['photoPath'] = $path;
                    array_push($arr, $dishArray);
                }

            }
        }
        return $arr;
    }

    /**
     * Load dish data with photo
     * @param Dish $dish
     * @return array
     */
    public function getDish(Dish $dish): array
    {
        $path = null;
        $photoId=null;
        if ($dish->photo) {
            $path = url('storage' . $dish->photo->path);
            $photoId=$dish->photo->id;
        }
        return [
            'id' => $dish->id,
            'name' => $dish->name,
            'price' => $dish->price,
            'comment' => $dish->comment,
            'category_id' => $dish->category_id,
            'photo_path' => $path,
            'photoId' => $photoId
        ];
    }
}