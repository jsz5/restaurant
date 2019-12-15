<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\StatisticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiStatisticsController extends Controller
{
    /**
     * @param string $year
     * @return JsonResponse
     */
    public function yearStatisticsIndex(string $year)
    {
        try {
            return response()->json(['statistics' => $this->getStatisticsService()->yearsStatistics($year)], 200);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * @param string $year
     * @param int $waiterId
     * @return JsonResponse
     */
    public function waiterStatisticsIndex(string $year, int $waiterId)
    {
        return $this->waiterStatistics($year,$waiterId);
    }

    /**
     * @param string $year
     * @return JsonResponse
     */
    public function waiterMyStatisticsIndex(string $year)
    {
       return $this->waiterStatistics($year,Auth::id());
    }

    /**
     * @param string $year
     * @param int $waiterId
     * @return JsonResponse
     */
    private function waiterStatistics(string $year, int $waiterId)
    {
        try {
            return response()->json(['statistics' => $this->getStatisticsService()->waiterStatistics($year, $waiterId)], 200);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * @param string $year
     * @return JsonResponse
     */
    public function customerYearStatisticsIndex(string $year)
    {
        try {
            return response()->json(['statistics' => $this->getStatisticsService()->customerStatisticsYear($year)], 200);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }

    /**
     * @return JsonResponse
     */
    public function favouriteDishesStatisticsIndex()
    {
        try {
            return response()->json(['statistics' => $this->getStatisticsService()->favouriteDishes()], 200);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }


    /**
     * @param string $from
     * @param string $to
     * @return JsonResponse
     */
    public function customerIntervalStatisticsIndex(string $from, string $to)
    {
        try {
            return response()->json(['statistics' => $this->getStatisticsService()->customerStatisticsInterval($from,$to)], 200);
        } catch (\Exception $exception) {
            Log::notice("Error :" . $exception);
            Log::notice("Error :" . $exception->getMessage());
            Log::notice("Error :" . $exception->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }
    /**
     * @return StatisticsService
     */
    private function getStatisticsService():StatisticsService
    {
        return new StatisticsService();
    }
}
