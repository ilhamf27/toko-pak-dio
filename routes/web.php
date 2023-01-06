<?php

use App\Models\Item;
use App\Models\Order;
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

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home', [
        'items' => Item::all()
    ]);
});

Route::get('/riwayat', function () {

    // ddd(Order::all());
    return view('history', [
        'orders' => Order::all()->where('status')
    ]);
});
