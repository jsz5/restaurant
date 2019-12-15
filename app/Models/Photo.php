<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
