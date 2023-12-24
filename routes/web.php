<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessLogController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TrackLog;
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

Route::get('/', [CustomerController::class,'controller']);
Route::get('/tracklog',[TrackLogController::class,'index2']);
Route::get('/tracklog/log', [TrackLogController::class,'showAll'])->name('trackloging');
Route::get('/tracklog/loglist', [TrackLogController::class,'showChart'])->name('tracklog');