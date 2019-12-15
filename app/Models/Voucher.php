<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use SoftDeletes;

    protected $table = 'vouchers';

    protected $fillable = [
        'token',
        'discount',
        'user_id',
        'qr_code_path'
    ];
    /**
    * @codeCoverageIgnore
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
