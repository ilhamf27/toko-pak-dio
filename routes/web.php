<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'checkin'])->middleware('guest');
Route::post('/', [UserController::class, 'store'])->middleware('guest');
Route::post('/logout', [UserController::class, 'destroy'])->middleware('auth');

Route::get('/home', [ItemController::class, 'index'])->name('home')->middleware('auth');

Route::get('/riwayat', [OrderController::class, 'riwayat']);
Route::patch('/accepted/{order}', [OrderController::class, 'diterima'])->middleware('auth');
Route::patch('/checkout/{order}', [OrderController::class, 'checkout'])->middleware('auth');
