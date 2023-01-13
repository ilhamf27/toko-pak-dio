<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="POST" action="/tambah/user">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="itemModalLabel">Tambah User Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" value="null">
                    <div class="lg:grid lg:grid-cols-2">
                        <div class="form-floating mb-3 mx-2">
                            <input type="string" class="form-control" id="user_name" name="user_name"
                                placeholder="name@example.com">
                            <label for="user_name">Nama</label>
                        </div>
                        @error('user_name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <div class="form-floating mb-3 mx-2">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com">
                            <label for="email">Email</label>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <div class="form-floating mb-3 mx-2">
                            <input type="number" class="form-control" id="saldo" name="saldo"
                                placeholder="name@example.com">
                            <label for="saldo">Saldo</label>
                        </div>
                        @error('saldo')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <div class="form-floating mb-3 mx-2">
                            <input type="password" class="form-control" id="pass_user" name="pass_user"
                                placeholder="name@example.com">
                            <label for="pass_user">Password</label>
                        </div>
                        @error('pass_user')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <div class="form-check form-switch mx-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_admin"
                                name="is_admin">
                            <label class="form-check-label" for="is_admin">Admin</label>
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
