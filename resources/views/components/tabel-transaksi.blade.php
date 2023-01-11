@props(['orders'])
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Pembeli</th>
            {{-- <th scope="col">Alamat Pengiriman</th> --}}
            <th scope="col">Tgl Checkout</th>
            <th scope="col">@sortablelink('status')</th>
            <th scope="col">Jumlah Dibayar</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @php
            $increment = 1;
            $grand_price = 0;
        @endphp
        @if (count($orders) == 0)
            <tr>
                <td colspan="6" class="text-center"> Belum Ada Transaksi</td>
            </tr>
        @endif
        @foreach ($orders as $order)
            <tr>
                <th scope="row">{{ $increment }}</th>
                <td>{{ $order->user->name }}</td>
                {{-- <td>{{ $order->delivery_address }}</td> --}}
                <td>{{ $order->created_at }}</td>
                <td>
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
                </td>
                <td>
                    @php
                        $increment += 1;
                        $price_final = 0;
                        foreach ($order->item_order as $item_order) {
                            $price_final = $price_final + $item_order->qty * $item_order->item->price;
                        }
                        $grand_price += $price_final;
                    @endphp
                    Rp {{ number_format($price_final, 2, ',', '.') }}
                </td>
                <td>
                    <a class="list-group-item-action" id="list-{{ $order->id }}-list" data-bs-toggle="list"
                        href="#list-{{ $order->id }}" role="tab" aria-controls="list-one">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total Pendapatan</th>
            <th colspan="2">
                Rp {{ number_format($grand_price, 2, ',', '.') }}
            </th>
        </tr>
    </tfoot>
</table>
