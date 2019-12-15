<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = [
        'name',
        'path'
    ];
    /**
    * @codeCoverageIgnore
    */
    public function dish()
    {
        return $this->hasOne(Dish::class);
    }

    public function deletePhoto()
    {
        Storage::delete('public' . $this->path);
        $this->delete();
    }
}
