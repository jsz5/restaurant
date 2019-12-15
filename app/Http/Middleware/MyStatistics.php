<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyStatistics
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = Auth::user();
        if ($auth->hasPermissionTo('statisticsShow')) {
            return $next($request);
        }
        if ($auth->id !== intval($request->route('id')) || !$auth->hasPermissionTo('workerStatisticsShow')) {
            abort(403, 'Access denied');
        }
        return $next($request);

    }

}