@props(['users'])
<div class="card mt-8">
    <div class="card-header flex justify-content-between">
        <p class="fs-1">
            <b>Manajemen User</b>
        </p>
        <div class="d-flex flex-fill" style="max-width: 40%">
            <button class="btn btn-primary my-auto me-2" data-bs-toggle="modal" data-bs-target="#userModal"
                data-bs-whatever="none">User Baru</button>
            <form method="GET" class="my-auto flex-fill">
                <input class="form-control me-2" type="text" placeholder="Find Something" aria-label="Search"
                    id="navBarSearchForm" name="search">
            </form>
        </div>
        <x-modal-users />
        <x-modal-add-stok-or-user />
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Tgl Update</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $increment = 0;
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $increment += 1 }}</th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin ? 'Admin' : 'Pelanggan' }}</td>
                        <td>
                            <div class="d-flex align-items-center">

                                <a type="button" class="me-2" data-bs-toggle="modal" data-bs-target="#addModal"
                                    data-bs-whatever="{{ 'user,' . $user->id . ',' . $user->name }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                        class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                    </svg>
                                </a>
                                Rp {{ number_format($user->saldo, 2, ',', '.') }}
                            </div>
                        </td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="{{ $user->id . ',' . $user->name . ',' . $user->email . ',' . $user->saldo . ',' . $user->is_admin }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
