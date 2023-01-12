@props(['reports'])
<div class="card mt-8">
    <div class="card-header flex justify-content-between">
        <p class="fs-1">
            <b>Laporan {{ Request::path() === 'laporan-harian' ? 'Harian' : 'Bulanan' }}</b>
        </p>


    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Jumlah User</th>
                    <th scope="col">Jumlah Transaksi</th>
                    <th scope="col">Item Terjual</th>
                    <th scope="col">Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @if (count($reports) == 0)
                    <tr>
                        <td colspan="6">Tidak Ada Data</td>
                    </tr>
                @endif
                @foreach ($reports as $report)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $report->waktu }}</td>
                        <td>{{ $report->jml_user }}</td>
                        <td>{{ $report->jml_order }}</td>
                        <td>{{ $report->jml_item }}</td>
                        <td>Rp {{ number_format($report->pendapatan, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
