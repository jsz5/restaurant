<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteDish extends Model
{
    protected $table = 'favourite_dish';

    protected $fillable = [
        'dish_id',
        'user_id'
    ];

    /**
    * @codeCoverageIgnore
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * @codeCoverageIgnore
    */
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
