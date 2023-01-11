<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardTransaksiOrderDetail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $order;
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-transaksi-order-detail');
    }
}
