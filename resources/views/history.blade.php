<x-layout>
    <x-navbar :user=$user/>
    <div class="container py-4">
        <div class="row">
            <div class="col col-md-6">
                <div class="list-group list-group-flush mb-2">
                    @foreach ($orders as $order)
                    <x-card-history-order :order=$order/>
                    @endforeach
                </div>
                {{ $orders->links() }}
            </div>
            <div class="col col-md-6 flex align-items-stretch">
                <div class="tab-content flex-fill" id="nav-tabContent">
                    @foreach ($orders as $order)
                    <x-card-order-detail :order=$order/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <x-cart :carts=$carts/>
</x-layout>
