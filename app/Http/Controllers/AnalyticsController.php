<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function display()
    {
        return view('analytics.analytics');
    }
}
