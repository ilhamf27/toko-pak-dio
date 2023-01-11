<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\If_;

class OrderController extends Controller
{
    public function riwayat()
    {
        return view('history', [
            'orders' => Order::where('user_id','=', Auth::id())->whereIn('status', ['dibayar', 'diterima', 'dikirim'])->paginate(5),
            'carts' => ItemOrder::with('order')->get()->where('order.user_id', '=', Auth::id())->where('order.status','=',null),
            'user' => Auth::user()
        ]);
    }

    public function laporan()
    {

        $sql = `
        SELECT orders.created_at as waktu, COUNT(orders.user_id) as jml_user, COUNT(orders.id) as jml_order, SUM(item_orders.qty) as jml_item, SUM(orders.grand_total) as pendapatan
        FROM orders JOIN item_orders ON orders.id=item_orders.order_id JOIN items ON item_orders.item_id=items.id
        GROUP BY waktu
        `;
        $orders = Order::select(DB::raw('orders.created_at, count(orders.user_id) as jml_user, count(orders.id) as jml_order, SUM(item_orders.qty) as jml_item, SUM(orders.grand_total) as pendapatan'))->join('item_orders', 'item_orders.order_id', '=', 'orders.id')->join('items', 'item_orders.item_id', '=', 'itesm.id')->groupBy('orders.created_at')
        ->get();

        dd($orders);

        return view('laporan');
    }

    public function diterima(Order $order)
    {
        Order::where('id', $order->id)->update(array('status'=>"diterima"));

        return back()->with('success', 'Status Berhasil diupdate');
    }

    public function dikirim(Order $order)
    {
        Order::where('id', $order->id)->update(array('status'=>"dikirim"));

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

        date_default_timezone_set("Asia/Jakarta");
        $formatted = date('y-m-d h:i:s');

        Order::where('id', $order->id)->update(array(
            'status'=>"dibayar",
            'created_at' => $formatted,
            'delivery_address' => $attributes['alamat'],
            'grand_total' => $price_final
        ));

        // $order->update($attributes);

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
        $checkOrder = Order::query()->where('user_id', '=', Auth::id())->whereNull('status')->get();

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

    public function dashboard()
    {
        return view('dashboard', [
            'orders' => Order::sortable()->get()->whereIn('status', ['dibayar', 'diterima', 'dikirim']),
            'user' => Auth::user()
        ]);
    }
}
