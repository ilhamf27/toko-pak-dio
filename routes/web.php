<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemOrderController;
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
Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/riwayat', [OrderController::class, 'riwayat'])->middleware('auth');
Route::get('/laporan', [OrderController::class, 'laporan'])->middleware('auth');
Route::get('/stok', [ItemController::class, 'stok_item'])->middleware('auth');
Route::get('/manajemen-user', [UserController::class, 'list_user'])->middleware('auth');

//Change Status Statis
Route::patch('/accepted/{order}', [OrderController::class, 'diterima'])->middleware('auth');
Route::patch('/delivered/{order}', [OrderController::class, 'dikirim'])->middleware('auth');

Route::patch('/checkout/{order}', [OrderController::class, 'checkout'])->middleware('auth');
Route::patch('/tambah-item/{item}', [OrderController::class, 'tambah_item'])->middleware('auth');
Route::patch('/delete-item/{item_order}', [ItemOrderController::class, 'delete_item'])->middleware('auth');
