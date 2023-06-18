<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerDemographicController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerCustomerDemoController;
use App\Http\Controllers\EmployeeTerritoryController;
use App\Http\Controllers\CustomerSearchController;
use App\Http\Controllers\ShipperCRUDController;
use App\Http\Controllers\API\SocialAuthController;
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

Route::get('/login-google', [SocialAuthController::class, 'redirectToProvider'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleCallback'])->name('google.login.callback');

Route::resource('region', RegionController::class);
Route::resource('territory', TerritoryController::class);
Route::resource('products', ProductController::class);
Route::resource('shipper', ShipperController::class);
Route::resource('order', OrderController::class);
Route::resource('customerdemographic', CustomerDemographicController::class);
Route::resource('customers', CustomerController::class);
Route::resource('category', CategoryController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('orderDetails', OrderDetailController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('customer_customer_demos', CustomerCustomerDemoController::class);
Route::resource('employee_territories', EmployeeTerritoryController::class);
Route::get('/search', [RegionController::class, 'search'])->name('search');
Route::get('/customers/search', [CustomerSearchController::class, 'search'])->name('customers.search');
Route::get('/shipperCRUD', [ShipperCRUDController::class, 'index'])->name('shipper.index');
Route::get('/shipperCRUD/{id}', [ShipperCRUDController::class, 'show'])->name('shipper.show');
Route::get('/action', [TerritoryController::class, 'action'])->name('action');
Route::post('/shipperCRUD', [ShipperCRUDController::class, 'store'])->name('shipper.store');
Route::put('/shipperCRUD/{id}', [ShipperCRUDController::class, 'update'])->name('shipper.update');
Route::delete('/shipperCRUD/{id}', [ShipperCRUDController::class, 'destroy'])->name('shipper.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
