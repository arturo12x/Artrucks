<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\CamionController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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


/*
Route::get('/chofer', function () {
    return view('chofer.index');
});

Route::get('/chofer', function () {
    return view('chofer.index');
});

Route::get('/chofer/create',[ChoferController::class,'create']);
*/
Route::resource('chofer',ChoferController::class)->middleware('auth');
Route::resource('camion',CamionController::class)->middleware('auth');



Route::get('/',[BienvenidaController::class,'index'])->middleware('auth');


Auth::routes();




Route::group(['middleware'=>'auth'],function () {
    Route::get('/',[BienvenidaController::class,'index']);
});