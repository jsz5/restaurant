<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\Photo;
use App\Services\DishService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiDishController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json((new DishService())->dishWithFavourite(Dish::all()->load('category')));
    }

    /**
     * Load dish data
     * @param Dish $dish
     * @return JsonResponse
     */
    public function load(Dish $dish)
    {
        try {
            return response()->json((new DishService())->getDish($dish));
        } catch (\Exception $e) {
            Log::notice("Error deleting data all:" . $e);
            Log::notice("Error deleting data msg:" . $e->getMessage());
            Log::notice("Error deleting data code:" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Delete dish
     * @param Dish $dish
     * @return JsonResponse
     */
    public function delete(Dish $dish)
    {
        try {
            $dish->delete();
            return response()->json("Danie usunięte", 201);
        } catch (\Exception $e) {
            Log::notice("Error deleting data all:" . $e);
            Log::notice("Error deleting data msg:" . $e->getMessage());
            Log::notice("Error deleting data code:" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Create new dish
     * @param DishRequest $request [name,price,category_id]
     * @return JsonResponse
     */
    public function store(DishRequest $request)
    {
        try {
            $dish = new Dish();
            $dish->name = $request->name;
            $dish->price = $request->price;
            $dish->comment = $request->comment;
            $dish->category()->associate(DishCategory::findOrFail($request->category_id));
            if ($request->photoId) {
                $photo = Photo::findOrFail($request->photoId);
                $dish->photo()->associate($photo);
            }
            $dish->save();
            return response()->json(['message' => "Danie zostało pomyślnie zapisane."], 200);
        } catch (\Exception $e) {
            Log::notice("Error storing data all:" . $e);
            Log::notice("Error storing data msg:" . $e->getMessage());
            Log::notice("Error storing data code:" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Update new dish
     * @param DishRequest $request [id,name,price,category_id]
     * @return JsonResponse
     */
    public function update(DishRequest $request)
    {
        try {
            $dish = Dish::findOrFail($request->id);
            $dish->name = $request->name;
            $dish->price = $request->price;
            $dish->comment = $request->comment;
            $dish->category()->associate(DishCategory::findOrFail($request->category_id));
            if ($request->photoId) {
                $photo = Photo::findOrFail($request->photoId);
                $dish->photo()->associate($photo);
            }
            $dish->save();
            return response()->json(['message' => "Danie zostało pomyślnie zapisane."], 200);
        } catch (\Exception $e) {
            Log::notice("Error updating data all:" . $e);
            Log::notice("Error updating data msg:" . $e->getMessage());
            Log::notice("Error updating data code:" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Remove photo from dish
     * @param Request $request
     * @return JsonResponse
     */
    public function removePhoto(Request $request)
    {
        try {
            $dish = Dish::findOrFail($request->id);
            $photo = Photo::findOrFail($request->photoId);
            $dish->photo_id = null;
            $dish->save();
            $photo->deletePhoto();
        }catch (\Exception $e){
            Log::notice("Error updating data all:" . $e);
            Log::notice("Error updating data msg:" . $e->getMessage());
            Log::notice("Error updating data code:" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }
}
