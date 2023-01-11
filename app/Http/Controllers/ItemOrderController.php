<?php

namespace App\Http\Controllers;

use App\Models\ItemOrder;
use Illuminate\Http\Request;

class ItemOrderController extends Controller
{
    public function delete_item(ItemOrder $item_order)
    {
        ItemOrder::where('id', $item_order->id)->delete();

        return back()->with('success', 'Barang Berhasil dihapus dari keranjang');
    }
}
