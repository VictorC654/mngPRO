<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task;
class AnalyticsController extends Controller
{
    public function display()
    {
        $profits = [];
        $dates[] = [];

        $date = Video::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString()
        )->select('created_at')->get();
        $profit = Video::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString()
        )->select('profit')->get();

        foreach ($profit as $p)
        {
            $profits[] = $p->profit;
        }

        foreach ($date as $d)
        {
            $dates[] = $d->created_at;
        }

        // SECOND
        $totalProfit = 0;
        foreach ($profit as $p)
        {
            $totalProfit = $totalProfit + $p->profit;
        }
        return view('analytics.analytics', compact('dates', 'profits', 'totalProfit'));
    }
}
