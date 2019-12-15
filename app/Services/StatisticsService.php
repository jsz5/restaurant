<?php


namespace App\Services;

use App\Interfaces\StatusTypesInterface;
use App\Models\Check;
use App\Models\FavouriteDish;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class StatisticsService
{
    /**
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
    public function favouriteDishes(){
        $dishes = FavouriteDish::all()->countBy('dish_id');
        return $dishes->sort()->reverse();
    }
}
