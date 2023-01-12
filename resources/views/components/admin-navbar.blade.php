<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">Dashboard Toko Pak Dio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mx-4">
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() === 'dashboard' ? 'active' : '' }}" aria-current="page"
                        href="/dashboard">Transaksi Penjualan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() === 'stok' ? 'active' : '' }}" href="/stok">Stok Item</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Laporan Penjualan
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/laporan-harian">
                                Laporan Harian
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/laporan-bulanan">
                                Laporan Bulanan
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Lebih Banyak
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/manajemen-user">
                                Manajemen User
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit">
                                        Log Out
                                    </button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
