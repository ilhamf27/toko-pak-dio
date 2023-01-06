@props(['order'])
<div class="card tab-pane fade show active" id="list-{{ $order->id }}" role="tabpanel"
    aria-labelledby="list-{{ $order->id }}-list">
    <div class="card-header flex justify-content-between">
        <div>
            <span class="mt-2 block text-gray-400 text-xs">
                Alamat Pengiriman
            </span>
            {{ $order->delivery_address }}
        </div>
        <a href="#" class="btn btn-outline-info btn-sm mt-auto mb-auto">Barang Telah Diterima</a>
    </div>
    <div class="card-body">
        <div class="d-flex mb-2 justify-content-end">
            <span class="badge rounded-pill text-bg-info">status</span>
        </div>
        <div class="row mb-3">
            <div class="col col-md-6">
                <div class="row">
                    <div class="col col-md-4">
                        <span class="mt-2 block text-gray-400 text-xs">
                            Waktu Transaksi
                        </span>
                    </div>
                    <div class="col col-md-1">:</div>
                    <div class="col col-md-7">
                        <span class="mt-2 block text-gray-400 text-xs">
                            Tgl Nya disini
                        </span>
                    </div>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="row">
                    <div class="col col-md-4">
                        <span class="mt-2 block text-gray-400 text-xs">
                            Waktu Diterima
                        </span>
                    </div>
                    <div class="col col-md-1">:</div>
                    <div class="col col-md-7">
                        <span class="mt-2 block text-gray-400 text-xs">
                            Tgl Nya disini
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            {{-- @for ($i = 0; $i < 5; $i++) --}}
            @foreach ($order->item_order as $item_order)
                <li class="list-group-item">
                    <div class="row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">{{ $item_order->name }}</label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" value="banyak item">
                        </div>
                        <div class="col-sm-4 d-flex align-items-center">
                            {{ $item_order->price }}
                        </div>
                    </div>
                </li>
            @endforeach
            {{-- @endfor --}}
        </ul>
    </div>
    <div class="card-footer text-muted">
        <div class="row">
            <div class="col col-md-8 flex">
                <span class="block text-gray-400 text-xs mt-auto mb-auto">
                    Total
                </span>
            </div>
            <div class="col col-md-4 d-flex align-items-end flex-column">
                <div class="ml-auto">

                    <b>Rp 100,000.00</b>
                </div>
            </div>
        </div>
    </div>
</div>
