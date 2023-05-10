<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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
Route::get('/', [DataController::class, 'index']);
Route::get('/cars', [DataController::class, 'cars']);
Route::get('/purchase', [DataController::class, 'purchase']);
Route::get('/customer', [DataController::class, 'customer']);
Route::get('/sales', [DataController::class, 'sales']);
Route::get('/admin', [DataController::class, 'admin']);

Route::post('newcar', [DataController::class, 'insertCar']);
Route::post('carsubmit', [DataController::class, 'purchaseSubmit']);
Route::post('customersubmit', [DataController::class, 'customerSubmit']);
Route::post('customerdelete', [DataController::class, 'deleteCustomer']);
Route::post('cardelete', [DataController::class, 'deleteCar']);
Route::post('carupdate', [DataController::class, 'updateCar']);