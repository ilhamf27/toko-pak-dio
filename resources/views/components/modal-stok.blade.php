<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="POST" action="/tambah/item">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="itemModalLabel">Tambah Item Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id=item_id name=item_id value="null">
                    <div class="lg:grid lg:grid-cols-2">
                        <div class="form-floating mb-3 mx-2">
                            <input type="string" class="form-control" id="item_name" name="item_name"
                                placeholder="name@example.com">
                            <label for="item_name">Nama</label>
                        </div>
                        @error('item_name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <div class="form-floating mb-3 mx-2">
                            <input type="number" class="form-control" id="stock" name="stock"
                            placeholder="name@example.com">
                            <label for="stock">Jumlah Stok</label>
                        </div>
                        @error('stock')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <div class="form-floating mb-3 mx-2">
                            <input type="number" class="form-control" id="price" name="price"
                            placeholder="name@example.com">
                            <label for="price">Harga</label>
                        </div>
                        @error('price')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <div class="form-floating mb-3 mx-2">
                            <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description" style="height: 100px"></textarea>
                            <label for="description">Deskripsi</label>
                        </div>
                        @error('description')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
