<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('region', RegionController::class);
Route::resource('territory', TerritoryController::class);
Route::resource('products', ProductController::class);
Route::resource('shipper', ShipperController::class);
Route::resource('order', OrderController::class);