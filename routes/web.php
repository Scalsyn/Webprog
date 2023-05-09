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

Route::get('/cars', [DataController::class, 'cars']);
Route::get('/purchase', [DataController::class, 'purchase']);
Route::get('/customer', [DataController::class, 'customer']);
Route::get('/sales', [DataController::class, 'sales']);

Route::post('carsubmit', [DataController::class, 'purchaseSubmit']);
Route::post('customersubmit', [DataController::class, 'purchaseSubmit']);