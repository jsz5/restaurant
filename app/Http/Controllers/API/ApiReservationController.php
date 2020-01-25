<?php

namespace App\Http\Controllers\API;

use App\Events\ReservationChanged;
use App\Http\Controllers\Controller;
use App\Http\Requests\Reservation\CustomerReservationRequest;
use App\Http\Requests\Reservation\WorkerReservationRequest;
use App\Mails\ReservationMail;
use App\Models\Reservation;
use App\Services\ReservationService;
use Illuminate\Support\Facades\Log;

class ApiReservationController extends Controller
{
    /**
     * store reservation as customer
     * @param CustomerReservationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeAsCustomer(CustomerReservationRequest $request)
    {
        try {
           if($this->getReservationService()->storeCustomerReservation($request)){
                return response()->json(["message" => "Rezerwacja została pomyślnie zapisana."], 200);
            }
            return response()->json("Brak dostępnego stolika w podanym terminie.", 500);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * store reservation as worker
     * @param WorkerReservationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeAsWorker(WorkerReservationRequest $request)
    {
        try {
            $this->getReservationService()->storeWorkerReservations($request);
            return response()->json(['message' => "Rezerwacja została pomyślnie zapisana."], 200);

        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }


    /**
     * show reservation for customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function customerIndex()
    {
        try {
            return response()->json(['reservations' => $this->getReservationService()->customerReservations()], 200);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * show reservation for worker
     * @param string $date
     * @return \Illuminate\Http\JsonResponse
     */
    public function workerIndex(string $date)
    {
        try {
            return response()->json(['reservations' => $this->getReservationService()->workerReservations($date)], 200);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }


    /**
     * Find free table for given date
     * @param string $date
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchTablesByDate(string $date)
    {
        try {
            return response()->json(['tables' => $this->getReservationService()->freeTablesByDate($date)], 200);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Load reservation date
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchReservation(int $id)
    {
        return response()->json(['reservation' =>  $this->getReservationService()->fetchReservation($id)], 200);
    }

    /**
     * Delete reservation
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id)
    {
        try {
            Reservation::findOrFail($id)->delete();
            broadcast(new ReservationChanged())->toOthers();
            return response()->json("Rezerwacja została anulowana", 201);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * Return service
     * @return ReservationService
     */
    private function getReservationService():ReservationService
    {
        return new ReservationService();
    }
}
