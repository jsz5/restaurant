<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiVoucherController extends Controller
{

    /**
     * All where with user_id = auth::id()
     * @return JsonResponse
     */
    public function myVoucher()
    {
        try {
            $vouchers = Voucher::where('user_id', Auth::id())->get();
            return response()->json($vouchers, 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }
}

