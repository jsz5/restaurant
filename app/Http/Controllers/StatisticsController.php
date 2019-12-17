<?php

namespace App\Http\Controllers;

class StatisticsController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function listWorker()
    {
        return view('statistics/workerList');
    }


    public function listAllWorkers()
    {
        return view('statistics/workersList');
    }

    public function allStatistics()
    {
        return view('statistics/adminList');
    }

    public function mainStatistics()
    {
        return view('statistics/mainAdmin');
    }

    /**
     * @param $workerId
     * @param $year
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function workerStatistics($workerId, $year)
    {
        return view('statistics/givenWorkerList', compact('year', 'workerId'));
    }


}
