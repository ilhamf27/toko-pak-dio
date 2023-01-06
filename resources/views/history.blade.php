<x-layout>
    <x-navbar />
    <div class="container py-4">
        <div class="row">
            <div class="col col-md-6">
                <div class="list-group list-group-flush mb-2">
                    @foreach ($orders as $order)
                    <x-card-history-order :order=$order/>
                    @endforeach
                </div>
                <x-pagination />
            </div>
            <div class="col col-md-6 flex align-items-stretch">
                <div class="tab-content flex-fill" id="nav-tabContent">
                    {{-- @for ($i = 0; $i < 1; $i++) --}}
                    @foreach (orders as $order)
                    <x-card-order-detail :order=$order/>
                    @endforeach
                    {{-- @endfor --}}
                </div>
            </div>
        </div>
    </div>
</x-layout>
