<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaOrderController;
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

Route::get('/', [PizzaOrderController::class, 'index']);
Route::post('/calculate', [PizzaOrderController::class, 'calculate'])->name('calculate');
Route::get('/order/details', [PizzaOrderController::class, 'orderDetails'])->name('order.details');