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
// manage videos
Route::get('/videos', [\App\Http\Controllers\VideosController::class, 'display']);
Route::post('/videos', [\App\Http\Controllers\VideosController::class, 'register']);
// analytics
Route::get('/analytics', [\App\Http\Controllers\AnalyticsController::class, 'display']);
// tasks
Route::get('/tasks', [\App\Http\Controllers\TasksController::class, 'display']);
Route::post('/tasks', [\App\Http\Controllers\TasksController::class, 'register']);
Route::post('/tasks/complete-task/{id}', [\App\Http\Controllers\TasksController::class, 'complete'])->name("completeTask");
Route::post('/tasks/delete-task/{id}', [\App\Http\Controllers\TasksController::class, 'delete'])->name('deleteTask');
