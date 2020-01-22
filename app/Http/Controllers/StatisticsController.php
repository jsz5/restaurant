<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StatisticsController extends Controller
{


    /**
     * Show the statistics for current logged worker
     *
     * @return View
     */
    public function listWorker()
    {
        return view('statistics/workerList');
    }


    /**
     * Show list of all workers for admin
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function listAllWorkers()
    {
        return view('statistics/workersList');
    }

    /**
     * Show all restaurant statistics
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function allStatistics()
    {
        return view('statistics/adminList');
    }

    /**
     * Show main statistics view for admin
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function mainStatistics()
    {
        return view('statistics/mainAdmin');
    }

    /**
     * @param $workerId - specific worker id
     * @param $year - specific year for statistics
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function workerStatistics($workerId, $year)
    {
        return view('statistics/givenWorkerList', compact('year', 'workerId'));
    }


}
