<x-layout>
    <x-navbar />
    <div class="lg:grid lg:grid-cols-5 container">
        @for ($i = 0; $i < 10; $i++)
            <x-card-item />
        @endfor
    </div>
    <div class="d-flex p-4 bd-highlight justify-content-center">
        <x-pagination />
    </div>
    <x-cart />
</x-layout>
