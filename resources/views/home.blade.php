<x-layout>
    <x-navbar />
    <x-flash />
    <div class="lg:grid lg:grid-cols-5 container">
        {{-- @for ($i = 0; $i < 10; $i++)
            <x-card-item />
        @endfor --}}
        @foreach ($items as $item)
            <x-card-item :item=$item />
            <x-item-detail :item=$item/>
        @endforeach
    </div>
    <div class="d-flex p-4 bd-highlight justify-content-center">
        {{ $items->links() }}
    </div>
    <x-cart :carts=$carts />
</x-layout>
