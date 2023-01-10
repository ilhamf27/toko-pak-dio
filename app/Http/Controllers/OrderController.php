<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\If_;

class OrderController extends Controller
{
    public function riwayat()
    {
        return view('history', [
            'orders' => Order::where('user_id','=', Auth::id())->paginate(5),
            'carts' => ItemOrder::with('order')->get()->where('order.user_id', '=', Auth::id())->where('order.status','=',null),
            'user' => Auth::user()
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
        $price_final = 0;
        $stock_update = true;

        foreach($order->item_order as $item_order){
            $price_final = $price_final+($item_order->item->price * $item_order->qty);
            if ($item_order->item->stock_qty < $item_order->order->qty) {
                $stock_update = false;
            }
        }

        if($existUser->saldo < $price_final){
            return back()->with('error', 'Saldo Anda Kurang!');
        }

        if(!$stock_update){
            return back()->with('error', 'Mohon maaf stock barang yang anda checkout ada yang kurang!');
        }

        foreach ($order->item_order as $item_order) {
            Item::where('id', $item_order->item->id)->update(array(
                'stock_qty' => $item_order->item->stock_qty - $item_order->qty
            ));
        }

        $saldoAkhir = $existUser->saldo - $price_final;

        $attributes = request()->validate([
            'alamat' => 'required|min:10',
        ]);

        Order::where('id', $order->id)->update(array(
            'status'=>"dibayar",
        ));

        $order->update($attributes);

        User::where('id', $existUser->id)->update(array(
            'saldo'=>$saldoAkhir
        ));

        return back()->with('success', 'Belanjaan anda sedang diproses, harap bersabar menunggu!');
    }

    // public function check_keranjang()
    // {

    // }

    public function tambah_item(Item $item)
    {
        $checkOrder = Order::where('user_id','=',Auth::id())->get()->where('status', '=', null);

        $count = 0;
        $existItemOrder = null;
        foreach($checkOrder as $key){
            $count += 1;
            foreach($key->item_order as $item_order){
                if($item_order->item->id == $item->id){
                    $existItemOrder = $item_order;
                }
            }
        }

        if($count == 0){
            $newOrder = Order::create(array(
                'user_id' => Auth::id()
            ));

            ItemOrder::create(array(
                'order_id' => $newOrder->id,
                'item_id' => $item->id,
                'qty' => 1
            ));

            return back()->with('success', 'Berhasil menambahkan barang ke keranjang!');
        }

        if ($existItemOrder != null) {
            ItemOrder::where('id', $existItemOrder->id)->update(array(
                'qty' => $existItemOrder->qty + 1,
            ));

            return back()->with('success', 'Berhasil menambahkan barang ke keranjang!');
        }

        ItemOrder::create(array(
            'order_id' => $checkOrder[0]->id,
            'item_id' => $item->id,
            'qty' => 1
        ));

        return back()->with('success', 'Berhasil menambahkan barang ke keranjang!');

    }
}
