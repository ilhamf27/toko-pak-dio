@props(['item'])
<div class="offcanvas offcanvas-end pb-4" tabindex="-1" id="offcanvasItemDetail{{ $item->id }}"
    aria-labelledby="offcanvasItemDetail{{ $item->id }}Label">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasItemDetail{{ $item->id }}Label">Detail Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    {{-- offcanvas --}}
    <div class="offcanvas-body d-flex flex-column justify-content-between">
        <div class="d-flex align-items-start flex-column">

            <div>
                <img src="https://th.bing.com/th/id/OIP.R6QCqPeQws4yCEnbpc4JowHaIW?pid=ImgDet&rs=1"
                    alt="Blog Post illustration" class="rounded-xl">
            </div>

            <div class="mt-4">
                <h1 class="text-xl">
                    {{ $item->name }}
                </h1>

                <span class="mt-2 block text-gray-400">
                    Rp {{ number_format($item->price, 2, ',', '.') }} | Stok : {{ $item->stock_qty }}
                </span>
            </div>

            <p class="my-3">
                {{ $item->description }}
            </p>

        </div>
        <form action="/tambah-item/{{ $item->id }}" method="POST" class="d-flex flex-column">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary btn-block">
                Pilih
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart-plus-fill align-self-center ml-auto" viewBox="0 0 16 16">
                        <path
                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                    </svg> --}}
            </button>
        </form>

    </div>
</div>
