<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ApiDishPhotoController extends Controller
{
    /**
     * @param PhotoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PhotoRequest $request)
    {
        try {
            $photo = new Photo();
            $photo->name = uniqid() . '.png';
            $photo->path = "/dishes/{$photo->name}";
            Storage::disk('public')
                ->put($photo->path, Image::make($request->file)->encode('png'));
            if ($photo->save()) {
                if ($request->photoId) {
                    $this->destroy($request->photoId);
                }
                return response()->json(['photoId' => $photo->id, 'photoUrl' => url('storage' . $photo->path)], 200);
            }
        } catch (\Exception $exception) {
            return response()->json(["Wystąpił błąd podczas zapisywania zdjęcia"], 500);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $photo = Photo::findOrFail($id);
            Storage::delete('public' . $photo->path);
            $photo->delete();
            return response()->json(["Zdjęcie zostało usunięte"], 200);
        } catch (\Exception $exception) {
            return response()->json(["Wystąpił błąd podczas usuwania zdjęcia"], 500);
        }
    }

}