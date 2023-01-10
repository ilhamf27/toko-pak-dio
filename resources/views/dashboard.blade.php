<x-layout>
    <x-admin-navbar :user=$user/>
    <div class="container">
        <div class="p-8">Semua Transaksi</div>
        <div class="row">
            <div class="col col-md-6">
                <x-tabel-transaksi />
            </div>
            <div class="col col-md-6 flex align-items-stretch">

            </div>
        </div>
    </div>
</x-layout>
