<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;

    protected $table = 'dish';

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'photo_id'
    ];

    /**
     * @codeCoverageIgnore
     * @return HasMany
     */
    public function check()
    {
        return $this->hasMany(Check::class);
    }

    /**
     * @codeCoverageIgnore
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(DishCategory::class)->withTrashed();
    }

    /**
     * @codeCoverageIgnore
     * @return BelongsTo
     */
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    /**
     * @codeCoverageIgnore
     * @return HasMany
     */
    public function favouriteUsers()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
