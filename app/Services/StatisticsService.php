<?php


namespace App\Services;

use App\Interfaces\StatusTypesInterface;
use App\Models\Check;
use App\Models\FavouriteDish;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class StatisticsService
{
    /**
     * Generate year statistics
     * @param string $year
     * @return array
     */
    public function yearsStatistics(string $year): array
    {
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[$i] = 0;
        }
        Order::where('status', StatusTypesInterface::TYPE_FINISHED)
            ->whereYear('created_at', $year)->get()->each(function ($order) use (&$data) {
                $sum = 0;
                foreach ($order->check as $item) {
                    $sum += (float)$item->dish->price * (float)$item->amount;
                }
                $sum = round($sum * (1 - (float)$order->discount), 2);
                $data[$order->created_at->month] += $sum;
            });
        return $data;
    }

    /**
     * Generate waiter statistics
     * @param string $year
     * @param int $waiterId
     * @return array
     */
    public function waiterStatistics(string $year, int $waiterId): array
    {
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[$i] = 0;
        }
        Order::where('status', StatusTypesInterface::TYPE_FINISHED)
            ->where('worker_id', $waiterId)
            ->whereYear('created_at', $year)->get()->each(function ($order) use (&$data) {
                $sum = 0;
                foreach ($order->check as $item) {
                    $sum += (float)$item->dish->price * (float)$item->amount;
                }
                $sum = round($sum * (1 - (float)$order->discount), 2);
                $data[$order->created_at->month] += $sum;
            });
        return $data;
    }

    /**
     * Return the most favourite dishes
     * desc sorted array by sum value
     * [dish_id => number of people who likes this dish]
     * @return FavouriteDish[]|Collection
     */
    public function favouriteDishes()
    {
        $dishes = FavouriteDish::all()->countBy('dish_id');
        return $dishes->sort()->reverse();
    }

    /**
     * Return array of customer who spend the most on online orders
     * [userId => sum of spend cash in given interval]
     * @param string $year
     * @return array
     */
    public function customerStatisticsYear(string $year): array
    {
        $data = [];

        Order::where([['status', StatusTypesInterface::TYPE_FINISHED], ['customer_id', '!=', null]])
            ->whereYear('created_at', $year)->get()->each(function ($order) use (&$data) {
                $sum = 0;
                foreach ($order->check as $item) {
                    $sum += (float)$item->dish->price * (float)$item->amount;
                }
                $sum = round($sum * (1 - (float)$order->discount), 2);
                if (isset($data[$order->customer_id])) {
                    $data[$order->customer_id] += $sum;
                } else {
                    $data[$order->customer_id] = $sum;
                }
            });
        arsort($data, SORT_NUMERIC);
        $arr = [];
        foreach ($data as $userId => $amount){
            if ($user = User::find($userId)) {
                $user["amountSpend"] = $amount;
                array_push($arr, $user);
            }
        }
        return $arr;
    }

    /**
     * Return array of customer who spend the most on online orders
     * [userId => sum of spend cash in given interval]
     * @param string $from
     * @param string $to
     * @return array
     */
    public function customerStatisticsInterval(string $from,string $to): array
    {
        $data = [];

        Order::where([['status', StatusTypesInterface::TYPE_FINISHED], ['customer_id', '!=', null]])
            ->whereBetween('created_at', [$from, $to])->get()->each(function ($order) use (&$data) {
                $sum = 0;
                foreach ($order->check as $item) {
                    $sum += (float)$item->dish->price * (float)$item->amount;
                }
                $sum = round($sum * (1 - (float)$order->discount), 2);
                if (isset($data[$order->customer_id])) {
                    $data[$order->customer_id] += $sum;
                } else {
                    $data[$order->customer_id] = $sum;
                }
            });
        arsort($data, SORT_NUMERIC);

        $arr = [];
        foreach ($data as $userId => $amount){
            if ($user = User::find($userId)) {
                $user["amountSpend"] = $amount;
                array_push($arr, $user);
            }
        }

        return $arr;
    }
}
