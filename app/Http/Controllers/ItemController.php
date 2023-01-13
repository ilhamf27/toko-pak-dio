<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    public function index()
    {
        return view('home', [
            'items' => Item::latest()->filter(request(['search']))->paginate(10),
            'carts' => ItemOrder::with('order')->get()->where('order.user_id', '=', Auth::id())->where('order.status', '=', null),
            'user' => Auth::user()
        ]);
    }

    public function stok_item()
    {
        return view('stok',[
            'items' => Item::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'item_id' => 'nullable',
            'item_name' => ['required','min:7',Rule::unique('items','name')],
            'stock' => 'required|integer|min:1',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        if($attributes['item_id'] != "null"){
            Item::where('id', $attributes['item_id'])->update([
                'name' => $attributes['item_name'],
                'stock_qty' => $attributes['stock'],
                'price' => $attributes['price'],
                'description' => $attributes['description']
            ]);
            return back()->with('success', 'Item Berhasil Diedit!');
        }

        Item::create([
            'name' => $attributes['item_name'],
            'stock_qty' => $attributes['stock'],
            'price' => $attributes['price'],
            'description' => $attributes['description']
        ]);

        return back()->with('success', 'Item Baru Berhasil Ditambahkan!');
    }

    public function top_up()
    {
        $attributes = request()->validate([
            'item_id' => 'nullable',
            'stock' => 'required|integer|min:1',
        ]);

        $old_item = Item::where('id', $attributes)->get();

        Item::where('id', $attributes['item_id'])->update([
            'stock_qty' => $old_item[0]->stock_qty + $attributes['stock'],
        ]);

        return back()->with('success', 'Berhasil Menambahkan Stock Item');
    }
}
