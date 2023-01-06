@props(['order'])
<div class="card list-group-item-action active mb-2 p-3" id="list-{{ $order->id }}-list" data-bs-toggle="list"
    href="#list-{{ $order->id }}" role="tab" aria-controls="list-{{ $order->id }}">
    <div class="flex justify-content-between">
        <div>
            <span class="mt-2 block text-gray-400 text-xs">
                Waktu Transaksi
            </span>
            {{ $order->created_at }}
        </div>
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
    <hr class="my-2" />
    <div class="row">
        <div class="col col-md-4 flex">
            <span class="block text-gray-400 text-xs mt-auto mb-auto">
                Total
            </span>
        </div>
        <div class="col col-md-8 d-flex align-items-end flex-column">
            <div class="ml-auto">

                <b>{{ $order->id }}</b>
            </div>
        </div>
    </div>
</div>
