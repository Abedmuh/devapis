<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessLogController;
use App\Http\Controllers\CustomerController;

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
Route::get('/trackuser', [CustomerController::class,'logtrack']);
// Route::get('/tracklog',function(){
//   return view('tracklog');
// }); 

// Route::resource('accesslog',AccessLogController::class);
