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
    public function statisticsService(string $year): array
    {
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[$i] = 0;
        }
        $orders = Order::where('status', StatusTypesInterface::TYPE_FINISHED)->whereYear('created_at', $year)->get();
//todo every/each
        foreach ($orders as $order) {
            $sum = 0;
            $items = Check::where('order_id', $order->id)->with('dish')->get();

            foreach ($items as $item) {
                $sum += (float)$item->dish->price * (float)$item->amount;
            }
            $sum = round($sum * (1 - (float)$order->discount), 2);
            $data[$order->created_at->month] += $sum;
        }
        return $data;
    }

    /**
     * @param string $year
     * @param string $waiterId
     * @return array
     */
    public function waiterStatisticsService(string $year, string $waiterId): array
    {
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[$i] = 0;
        }
        $orders = Order::where('status', StatusTypesInterface::TYPE_FINISHED)
            ->where('worker_id', $waiterId)
            ->whereYear('created_at', $year)->get();
//todo every/each
        foreach ($orders as $order) {
            $sum = 0;
            $items = Check::where('order_id', $order->id)->with('dish')->get();

            foreach ($items as $item) {
                $sum += (float)$item->dish->price * (float)$item->amount;
            }
            $sum = round($sum * (1 - (float)$order->discount), 2);
            $data[$order->created_at->month] += $sum;
        }
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
