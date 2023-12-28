<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrackLogController;

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

Route::get('/', [DashboardController::class,'index']);
Route::get('/logcount', [DashboardController::class,'logcount'])->name('dash.count');
Route::get('/logtime', [DashboardController::class,'logtime'])->name('dash.time');
Route::get('/logaccess', [DashboardController::class,'logaccess'])->name('dash.access');

// track log
Route::get('/tracklog',[TrackLogController::class,'index']);
Route::get('/tracklog/logtable', [TrackLogController::class,'showTable'])->name('track.table');
Route::get('/tracklog/logchart', [TrackLogController::class,'showChart'])->name('track.chart');