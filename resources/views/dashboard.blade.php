<x-layout>
    <x-admin-navbar :user=$user />
    <x-flash />
    <div class="container">
        <div class="d-flex py-8">
            <p class="mx-auto fs-1">
                <b>Transaksi Penjualan</b>
            </p>
        </div>
        <div class="row">
            <div class="col col-md-6">
                <div class="list-group list-group-flush mb-2">
                    <x-tabel-transaksi :orders=$orders />
                </div>
            </div>
            <div class="col col-md-6 flex align-items-stretch">
                <div class="tab-content flex-fill" id="nav-tabContent">
                    @foreach ($orders as $order)
                        <x-card-transaksi-order-detail :order=$order />
                    @endforeach
                </div>
            </div>
        </div>
</x-layout>
