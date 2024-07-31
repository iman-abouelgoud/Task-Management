<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', DashboardController::class)->name('dashboard');

Route::resource('projects', ProjectController::class)->only(['index']);

Route::resource('tasks', TaskController::class)->except(['show']);
Route::post('/tasks/update-priority', [TaskController::class, 'updatePriority'])->name('update_priority');




