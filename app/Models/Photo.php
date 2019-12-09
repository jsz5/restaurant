<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = [
        'name',
        'path',
        'dish_id'
    ];
    /**
    * @codeCoverageIgnore
    */
    public function danger()
    {
        return $this->belongsTo(Dish::class);
    }
}
