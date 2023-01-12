<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="POST" action="/tambah/stok" id="add_action" name="add_action">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Tambah Stok Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id=item_id name=item_id value="null">
                    <div class="lg:grid lg:grid-cols-2">
                        <div class="form-floating mb-3 mx-2">
                            <input type="string" class="form-control" id="item_name" name="item_name"
                                placeholder="name@example.com" disabled>
                            <label for="item_name">Nama</label>
                        </div>
                        <div class="form-floating mb-3 mx-2">
                            <input type="number" class="form-control" id="stock" name="stock"
                            placeholder="name@example.com">
                            <label for="stock">Jumlah Ditambahkan</label>
                        </div>
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
