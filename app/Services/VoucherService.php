<?php


namespace App\Services;

use App\Interfaces\StatusTypesInterface;
use App\Models\Check;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class VoucherService
{
    /**
     * @param string $date
     * @param $tables
     * @return array
     */
    public function checkVoucher(string $voucher): float
    {
        $vochers = Voucher::all()->pluck(['token']);
        if (in_array($voucher, $vochers)){
            $obj = Voucher::where('token',$voucher)->first();
            $disscount = $obj->discount;
            $obj->delete();
            return $disscount;
        }
        return 0;
    }
}
