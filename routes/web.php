<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('manager_main');
});
Route::get('/videos', [\App\Http\Controllers\VideosController::class, 'display']);
Route::post('/videos', [\App\Http\Controllers\VideosController::class, 'register']);

Route::get('/analytics', [\App\Http\Controllers\AnalyticsController::class, 'display']);
