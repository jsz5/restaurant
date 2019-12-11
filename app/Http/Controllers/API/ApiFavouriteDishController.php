<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavouriteDishRequest;
use App\Models\Dish;
use App\Models\FavouriteDish;
use App\Models\Voucher;
use App\Services\DishService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiFavouriteDishController extends Controller
{

    /**
     * All where user_id = auth::id()
     * @return JsonResponse
     */
    public function myFavourite()
    {
        try {
            $dishes = FavouriteDish::where('user_id', Auth::id())->get();
            return response()->json($dishes, 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * All where user_id = auth::id()
     * @return JsonResponse
     */
    public function onlyFavourite()
    {
        try {
            return response()->json((new DishService())->dishOnlyFavourite(Dish::all()), 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Adding dish to list of favourite
     * @param FavouriteDishRequest $request
     * @return JsonResponse
     */
    public function addFavourite(FavouriteDishRequest $request)
    {
        try {
            if (!$favouriteDishArray = FavouriteDish::where([['user_id',Auth::id()],["dish_id",$request->id]])->first()){
                $favouriteDish = new \App\Models\FavouriteDish();
                $favouriteDish->user()->associate(Auth::user());
                $favouriteDish->dish()->associate(\App\Models\Dish::find($request->id));
                $favouriteDish->save();
            }
            return response()->json("Dodano do ulubionych", 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Delete dish from list of favourite
     * @param FavouriteDishRequest $request
     * @return JsonResponse
     */
    public function deleteFavourite(FavouriteDishRequest $request)
    {
        try {
            if ($favouriteDish = FavouriteDish::where([['user_id',Auth::id()],["dish_id",$request->id]])->first()){
                $favouriteDish->delete();
            }
            return response()->json("Usunięto z ulubionych", 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }
}

