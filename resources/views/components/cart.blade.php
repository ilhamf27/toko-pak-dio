<div class="offcanvas offcanvas-end pb-4" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Keranjang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    {{-- offcanvas --}}
    <div class="offcanvas-body">
        <div class="d-flex align-items-start flex-column" style="height: 100%;">

            {{-- CardLoop --}}
            @for ($i = 0; $i < 8; $i++)
                <x-card-order-items />
            @endfor

            <div class="card mt-auto" style="width: 100%;">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Alamat Pengiriman</label>
                </div>

                <div class="card-footer">
                    <div class="flex">
                        <div class="me-auto"><b>Grand Total</b></div>
                        <div>Nominal Grand Total</div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary btn-block mt-2" type="button" style="width: 100%">Checkout</button>
        </div>

    </div>
</div>
