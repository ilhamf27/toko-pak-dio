@props(['item'])

<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl me-4 mt-4">
    <div class="py-6 px-5" style="height: 100%">
        <div>
            <img src="https://th.bing.com/th/id/OIP.R6QCqPeQws4yCEnbpc4JowHaIW?pid=ImgDet&rs=1"
                alt="Blog Post illustration" class="rounded-xl">
        </div>

        <header class="mt-4">
            <div>
                <h1 class="text-xl single-line">
                    {{ $item->name }}
                </h1>

                <span class="mt-2 block text-gray-400">
                    Rp {{ number_format($item->price, 2, ',', '.') }}
                </span>
            </div>
        </header>

        <p class="mt-3 multi-line">
            {{ $item->description }}

        </p>
        <p class="text-xs text-primary text-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvasItemDetail{{ $item->id }}"
            aria-controls="offcanvasItemDetail{{ $item->id }}"><i>lebih lengkap</i></p>


        <div class="card-footer mt-3">
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
                <span class="mt-2 block text-xs d-flex align-self-end">
                    Stok : {{ $item->stock_qty }}
                </span>
            </form>
        </div>
    </div>
</article>
