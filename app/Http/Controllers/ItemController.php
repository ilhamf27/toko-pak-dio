<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        // $user = User::all()->where('id', '=', Auth::id());

        // dd($user);

        // if (request('search')) {
        //     $items->where('name', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%');
        // }

        return view('home', [
            'items' => Item::latest()->filter(request(['search']))->paginate(10),
            'carts' => ItemOrder::with('order')->get()->where('order.user_id', '=', Auth::id())->where('order.status', '=', null),
            'user' => Auth::user()
        ]);
    }

    public function stok_item()
    {
        return view('stok');
    }
}
