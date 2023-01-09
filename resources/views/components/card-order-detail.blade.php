@props(['order'])
<div class="card tab-pane fade show" id="list-{{ $order->id }}" role="tabpanel"
    aria-labelledby="list-{{ $order->id }}-list">
    <div class="card-header flex justify-content-between">
        <div>
            <span class="mt-2 block text-gray-400 text-xs">
                Alamat Pengiriman
            </span>
            {{ $order->delivery_address }}
        </div>
        @if ($order->status === 'dikirim')
            <form action="/accepted/{{ $order->id }}" method="POST">
                @csrf
                @method('PATCH')
                <button href="#" class="btn btn-outline-info btn-sm mt-auto mb-auto">Barang Telah Diterima</button>
            </form>
        @endif
    </div>
    <div class="card-body">
        <div class="d-flex mb-2 justify-content-end">
            @switch($order->status)
                @case('dibayar')
                    <span class="badge rounded-pill text-bg-info mt-auto mb-auto">{{ $order->status }}</span>
                @break

                @case('dikirim')
                    <span class="badge rounded-pill text-bg-warning mt-auto mb-auto">{{ $order->status }}</span>
                @break

                @default
                    <span class="badge rounded-pill text-bg-success mt-auto mb-auto">{{ $order->status }}</span>
            @endswitch
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
                            {{ $order->created_at }}
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
                        <label for="staticEmail" class="col-sm-4 col-form-label">{{ $item_order->item->name }}</label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext"
                                value="{{ $item_order->qty }}">
                        </div>
                        <div class="col-sm-4 d-flex align-items-center">
                            Rp {{ number_format($item_order->item->price, 2, ',', '.') }}
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

                    <b>
                        @php
                            $price_final = 0;
                            foreach ($order->item_order as $item_order) {
                                $price_final = $price_final+($item_order->qty * $item_order->item->price);
                            }
                        @endphp
                        Rp {{ number_format($price_final, 2, ',', '.') }}
                    </b>
                </div>
            </div>
        </div>
    </div>
</div>
