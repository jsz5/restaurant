<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddVoucherToOrderRequest;
use App\Http\Requests\VoucherCreateRequest;
use App\Jobs\CreateVouchers;
use App\Models\Order;
use App\Models\Voucher;
use App\Services\VoucherService;
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

    /**
     * Add discount to existing order
     * @param AddVoucherToOrderRequest $request
     * @return JsonResponse
     */
    public function addVoucherToOrder(AddVoucherToOrderRequest $request)
    {
        try {
            $discount = (new VoucherService())->checkVoucher($request->discount_token);
            $order = Order::where('token', $request->token)->first();
            if ($order != null && $discount != 0){
                $order->discount = $discount;
                $order->save();
                return response()->json("Zniżka " . $discount * 100 . "% dodana do zamówienia!", 200);
            }
            return response()->json("Niepoprawne dane", 422);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }


    /**
     * Add discount
     * @param VoucherCreateRequest $request
     * @return JsonResponse
     */
    public function createVouchers(VoucherCreateRequest $request)
    {
        try {
            CreateVouchers::dispatch($request->discount);
            return response()->json("Promocja utowrzona. Wysyłanie maili w trakcie", 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }
}

