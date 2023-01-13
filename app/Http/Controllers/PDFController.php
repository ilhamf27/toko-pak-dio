<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOne()
    {
        $reports = Order::select(DB::raw('date_format(orders.created_at,"%Y-%m-%d") as waktu, count(orders.user_id) as jml_user, count(orders.id) as jml_order, SUM(item_orders.qty) as jml_item, SUM(orders.grand_total) as pendapatan'))->join('item_orders', 'item_orders.order_id', '=', 'orders.id')->join('items', 'item_orders.item_id', '=', 'items.id')->where('orders.status', '!=', null)->groupBy('waktu')->get();

        // ddd($orders);

        $pdf = PDF::loadView('testPDF', compact('reports'));
        $pdf->getOptions()->setChroot('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');

        return $pdf->download('laporan-harian.pdf');
    }
    public function indexTwo()
    {
        $reports = Order::select(DB::raw('date_format(orders.created_at,"%Y-%m") as waktu, count(orders.user_id) as jml_user, count(orders.id) as jml_order, SUM(item_orders.qty) as jml_item, SUM(orders.grand_total) as pendapatan'))->join('item_orders', 'item_orders.order_id', '=', 'orders.id')->join('items', 'item_orders.item_id', '=', 'items.id')->where('orders.status', '!=', null)->groupBy('waktu')->get();

        $pdf = PDF::loadView('testPDF', compact('reports'));
        $pdf->getOptions()->setChroot('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');

        return $pdf->download('laporan-bulanan.pdf');
    }
}
