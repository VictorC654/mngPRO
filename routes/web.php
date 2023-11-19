<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('manager_main');
});

// MANAGE VIDEOS

Route::get('/videos', [\App\Http\Controllers\VideosController::class, 'display']);
Route::post('/videos', [\App\Http\Controllers\VideosController::class, 'register']);
Route::post('/videos/delete-video/{id}', [\App\Http\Controllers\VideosController::class, 'destroy']);

// ANALYTICS

Route::get('/analytics', [\App\Http\Controllers\AnalyticsController::class, 'display']);

// TASKS

Route::get('/tasks', [\App\Http\Controllers\TasksController::class, 'display']);
Route::post('/tasks', [\App\Http\Controllers\TasksController::class, 'register']);
Route::post('/tasks/complete-task/{id}', [\App\Http\Controllers\TasksController::class, 'complete'])->name("completeTask");
Route::post('/tasks/delete-task/{id}', [\App\Http\Controllers\TasksController::class, 'delete'])->name('deleteTask');

// SORTING TASKS

Route::get('/tasks/sort-by/completed', [App\Http\Controllers\TasksController::class, 'sortByCompleted'])->name("sortByCompleted");
Route::get('/tasks/sort-by/in-progress', [App\Http\Controllers\TasksController::class, 'sortByInProgress'])->name("sortByInProgress");

// CLIENTS

Route::post('/clients/add-client', [App\Http\Controllers\ClientController::class, 'register']);
Route::post('/clients/delete-client/{id}', [App\Http\Controllers\ClientController::class, 'destroy']);
