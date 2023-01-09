<?php

namespace App\Http\Controllers;

use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function riwayat()
    {
        return view('history', [
            'orders' => Order::where('user_id','=', Auth::id())->paginate(5),
            'carts' => ItemOrder::with('order')->get()->where('order.user_id', '=', Auth::id())->where('order.status','=',null)
        ]);
    }

    public function diterima(Order $order)
    {
        Order::where('id', $order->id)->update(array('status'=>"diterima"));

        return back()->with('success', 'Status Berhasil diupdate');
    }

    public function checkout(Order $order)
    {
        $existUser = User::find(Auth::id());

        // if($existUser->saldo)
    }
}
