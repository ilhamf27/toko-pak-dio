@props(['carts'])
<div class="offcanvas offcanvas-end pb-4" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Keranjang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    {{-- offcanvas --}}
    <div class="offcanvas-body">
        <div class="d-flex align-items-start flex-column" style="height: 100%;">

            {{-- CardLoop --}}
            @foreach ($carts as $cart)
                <x-card-order-items :cart=$cart />
            @endforeach

            <div class="card mt-auto" style="width: 100%;">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Alamat Pengiriman</label>
                </div>

                <div class="card-footer">
                    <div class="flex">
                        <div class="me-auto"><b>Grand Total</b></div>
                        <div>
                            @php
                            $price_final = 0;
                            $order_id = "";
                            foreach ($carts as $item_order) {
                                $order_id = $item_order->order->id;
                                $price_final = $price_final+($item_order->qty*$item_order->item->price);
                            }
                            @endphp
                            Rp {{ number_format($price_final, 2, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            <form action="/checkout/{{ $order_id }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-primary btn-block mt-2" type="submit">Checkout</button>
            </form>

        </div>

    </div>
</div>
