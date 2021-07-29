<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChoferController;
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
    return view('welcome');
});

/*
Route::get('/chofer', function () {
    return view('chofer.index');
});

Route::get('/chofer', function () {
    return view('chofer.index');
});

Route::get('/chofer/create',[ChoferController::class,'create']);
*/
Route::resource('chofer',ChoferController::class);