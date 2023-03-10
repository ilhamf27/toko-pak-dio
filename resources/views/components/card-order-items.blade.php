@props(['cart'])
<div class="card mb-3" style="max-width: 100%;">
    <div class="row g-0 px-2">
        <div class="col-md-3 my-auto flex">
            <form class="my-auto me-2" action="/delete-item/{{ $cart->id }}" method="POST">
                @csrf
                @method('PATCH')

                <button type="submit" class="btn btn-danger"
                    style="--bs-btn-padding-y: .8rem; --bs-btn-padding-x: .2rem; --bs-btn-font-size: .60rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path
                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                </button>
            </form>
            <img src="https://th.bing.com/th/id/OIP.R6QCqPeQws4yCEnbpc4JowHaIW?pid=ImgDet&rs=1"
                alt="Blog Post illustration" class="rounded-md my-2" style="max-width:60px">
        </div>
        <div class="col-md-7">
            <div class="card-body">
                <h5 class="card-title">{{ $cart->item->name }}</h5>
                <p class="card-text">
                    {{-- {{ $cart->id }} --}}
                    <small class="text-muted">
                        Rp {{ number_format($cart->item->price, 2, ',', '.') }}
                    </small>
                </p>
            </div>
        </div>
        <div class="col-md-2 my-auto">
            <input
                type="number"
                class="form-control"
                placeholder=""
                aria-label="Example text with button addon"
                aria-describedby="button-addon1"
                readonly
                value="{{ $cart->qty }}"
            >
        </div>
    </div>
</div>
