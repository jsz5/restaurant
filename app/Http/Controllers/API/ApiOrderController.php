<?php

namespace App\Http\Controllers\API;

use App\Events\OrderChanged;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditOrderFromWorkerRequest;
use App\Http\Requests\Order\NewOrderFromWorkerRequest;
use App\Http\Requests\Order\NewOrderOnlineRequest;
use App\Http\Requests\Order\OrderChangeStatusRequest;
use App\Interfaces\StatusTypesInterface;
use App\Mails\OrderOnlineMail;
use App\Models\Check;
use App\Models\Order;
use App\Models\Table;
use App\Services\OrderService;
use App\Services\VoucherService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiOrderController extends Controller
{

    /**
     * Return free tables
     * @param string $date
     * @return JsonResponse
     */
    public function fetchTablesByDate(string $date)
    {
        try {
            return response()->json(['tables' => (new OrderService())->tablesByDate($date)], 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Return orders ordered in restaurant by customer in given table_id which status is ordered
     * For edit order purpose
     * @param $id table
     * @return JsonResponse
     */
    public function fetchOpenOrderByGivenTable($id)
    {
        try {
            $orders = Order::statusNotEqual(StatusTypesInterface::TYPE_FINISHED)
                ->orderedLocal()
                ->where("table_id", $id)
                ->get()
                ->load("check");
            return response()->json(
                $this->transStatus($orders), 200);

        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * All open order with given status
     * @param $type [ordered, ...]
     * @return JsonResponse
     */
    public function orderWithStatus($type)
    {
        try {
            $orders = Order::status($type)
                ->where('created_at', ">=", Carbon::today())
                ->with("check")
                ->get();
            return response()->json(
                $this->transStatus($orders), 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * All open order with worker_id = auth::id()
     * @return JsonResponse
     */
    public function myOrder()
    {
        try {
            $orders = Order::statusNotEqual(StatusTypesInterface::TYPE_FINISHED)
                ->where('worker_id', Auth::id())
                ->with("check")
                ->get();
            return response()->json(
                $this->transStatus($orders), 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * All orders customer_id = auth::id()
     * @return JsonResponse
     */
    public function customerOrder()
    {
        try {
            $orders = Order::where('customer_id', Auth::id())
                ->with("check")
                ->get()
                ->sortBy('updated_at');

            return response()->json(
                $this->transStatus($orders), 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }


    /**
     * To change status of order
     * @param OrderChangeStatusRequest $request
     * @return JsonResponse
     */
    public function changeStatusOrder(OrderChangeStatusRequest $request)
    {
        try {
            $types = StatusTypesInterface::TYPES;
            if (!in_array($request->status, $types))
                return response()->json('Błędnyy status', 422);
            if ($order = Order::where('token', $request->token)->first()) {
                $order->status = $request->status;
                $order->save();
                broadcast(new OrderChanged())->toOthers();
                return response()->json("Status zmieniony", 200);
            }
            return response()->json('Błędne id zamówienia', 500);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Get possible order status types
     * @return JsonResponse
     */
    public function fetchOrderStatusTypes()
    {
        try {
            $statuses = StatusTypesInterface::TYPES;
            $trans = [];
            foreach ($statuses as $status) {
                array_push($trans, ["status" => $status,
                    "status_pl" => trans('app.status.' . $status)]);
            }
            return response()->json($trans, 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Create new order as worker
     * @param NewOrderFromWorkerRequest $request ['table_id', items]
     * @return JsonResponse
     */
    public function storeNewOrderFromWorker(NewOrderFromWorkerRequest $request)
    {
        try {
            $order = new Order();
            $order->token = uniqid();
            $order->takeaway = false;
            $order->table()->associate($request->table_id);
            $order->status = StatusTypesInterface::TYPE_ORDERED;
            $order->worker()->associate(Auth::user());
            if ($request->discount_token) {
                $discount = (new VoucherService())->checkVoucher($request->discount_token);
                if ($discount == 0) {
                    return response()->json("Nieważny kod promocyjny", 422);
                }
                $order->discount = $discount;
            }
            if ($request->comment) {
                $order->comment = $request->comment;
            }
            $order->save();
            (new OrderService())->addItems($order, $request->items);
            broadcast(new OrderChanged())->toOthers();
            return response()->json("Zamówienie złożone", 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Create new online order
     * @param NewOrderOnlineRequest $request
     * @return JsonResponse
     */
    public function storeNewOrderOnline(NewOrderOnlineRequest $request)
    {
        try {
            $order = new Order();
            $order->token = uniqid();
            if ($user = Auth::user()) {
                $order->email = $user->email;
                $order->customer()->associate($user);
            } else {
                if ($request->email) {
                    $order->email = $request->email;
                } else {
                    return response()->json("Mail wymagany", 422);
                }
            }
            $order->takeaway = $request->takeaway;
            if (!$request->takeaway) {
                $order->address = json_encode($request->address);
            }
            if ($request->discount_token) {
                $discount = (new VoucherService())->checkVoucher($request->discount_token);
                if ($discount == 0) {
                    return response()->json("Nieważny kod promocyjny", 422);
                }
                $order->discount = $discount;
            }
            if ($request->comment) {
                $order->comment = $request->comment;
            }
            $order->status = StatusTypesInterface::TYPE_ORDERED;
            $order->save();
            (new OrderService())->addItems($order, $request->items);
            broadcast(new OrderChanged())->toOthers();
            (new OrderOnlineMail($order->email, $order->token))->sendMail();
            return response()->json(["message" => "Zamówienie złożone", "token" => $order->token], 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Show of order
     * @param $token
     * @return JsonResponse
     */
    public function loadOrder($token)
    {
        try {
            $tokens = Order::pluck('token')->toArray();
            if (!in_array($token, $tokens)) {
                abort(403);
            }
            $dishes = [];
            $sum = 0;
            if ($order = Order::where('token', $token)->first()) {
                $items = Check::where('order_id', $order->id)->with('dish')->get();
                foreach ($items as $item) {
                    array_push($dishes, [
                        "id" => $item->dish_id,
                        "name" => $item->dish->name,
                        'price' => (float)$item->dish->price,
                        'amount' => $item->amount]);
                    $sum += (float)$item->dish->price * (float)$item->amount;
                }
                return response()->json(["dishes" => $dishes,
                    'sum' => round($sum * (1 - $order->discount), 2),
                    'sumWithoutDiscount' => $sum,
                    'status' => $order->status,
                    'status_pl' => trans('app.status.' . $order->status),
                    'order' => $order,
                    'address' => $order->address
                ],
                    200);
            }
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Delete Ordere
     * @param $token
     * @return JsonResponse
     */
    public function deleteOrder($token)
    {
        try {
            $tokens = Order::pluck('token')->toArray();
            if (!in_array($token, $tokens)) {
                abort(403);
            }
            if ($order = Order::where('token', $token)->first()) {
                (new OrderService())->deleteCheck($order->id);
                $order->delete();
                broadcast(new OrderChanged())->toOthers();
                return response()->json("Zamówienie usunięte", 200);
            }
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Update order from worker
     * @param EditOrderFromWorkerRequest $request
     * @return JsonResponse
     */
    public function updateOrderFromWorker(EditOrderFromWorkerRequest $request)
    {
        try {
            $tokens = Order::pluck('token')->toArray();
            if (!in_array($request->token, $tokens)) {
                abort(403);
            }
            if ($order = Order::where('token', $request->token)->first()) {
                $items = Check::where('order_id', $order->id)->with('dish')->get();
                if ($order->status != StatusTypesInterface::TYPE_ORDERED) {
                    return response()->json("Zamówieniezostało już wykonane, edycja nie jest możliwa", 422);
                }
                foreach ($items as $item) {
                    $item->delete();
                }
                (new OrderService())->addItems($order, $request->items);
                if ($request->discount_token && $order->discount == 0) {
                    $discount = (new VoucherService())->checkVoucher($request->discount_token);
                    if ($discount == 0) {
                        return response()->json("Nieważny kod promocyjny", 422);
                    }
                    $order->discount = $discount;
                }
                if ($request->comment) {
                    $order->comment = $request->comment;
                }
                $order->save();
                broadcast(new OrderChanged())->toOthers();
                return response()->json("Zamówienie pomyślnie edytowane", 200);
            }
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Update online order
     * @param NewOrderOnlineRequest $request
     * @return JsonResponse
     */
    public function updateOnlineOrder(NewOrderOnlineRequest $request)
    {
        try {
            $tokens = Order::pluck('token')->toArray();
            if (!in_array($request->token, $tokens)) {
                abort(403);
            }
            if ($order = Order::where('token', $request->token)->first()) {
                $items = Check::where('order_id', $order->id)->with('dish')->get();
                if ($order->status != StatusTypesInterface::TYPE_ORDERED) {
                    return response()->json("Zamówieniezostało już wykonane, edycja nie jest możliwa", 422);
                }
                $order->takeaway = $request->takeaway;
                if (!$request->takeaway) {
                    $order->address = json_encode($request->address);
                }
                foreach ($items as $item) {
                    $item->delete();
                }
                if ($request->discount_token && $order->discount == 0) {
                    $discount = (new VoucherService())->checkVoucher($request->discount_token);
                    if ($discount == 0) {
                        return response()->json("Nieważny kod promocyjny", 422);
                    }
                    $order->discount = $discount;
                }
                $order->save();
                (new OrderService())->addItems($order, $request->items);
                broadcast(new OrderChanged())->toOthers();
                return response()->json("Zamówienie pomyślnie edytowane", 200);
            }
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Translate orders statuses
     * @param $orders
     * @return mixed
     */
    public function transStatus($orders)
    {
        foreach ($orders as $order) {
            $order['status_pl'] = trans('app.status.' . $order->status);
        }
        return $orders;
    }
}

