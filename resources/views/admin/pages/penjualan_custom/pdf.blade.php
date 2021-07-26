<html>

<head>
    <title>Laporan PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan PDF Penjualan Custom</h5>
        @if(isset($periode1)||isset($periode2))
        <h5>Tanggal</h5><strong>{{ $periode1 }} - {{ $periode2 }}</strong>
        @else
        <h5>Seluruh Periode</h5>
        @endif
        <br>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Tanggal Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Status Transaksi</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($custom as $key)
            <tr>
                <td>{{$key->date}}</td>
                <td>{{$key->first_name}}</td>
                <td>{{$key->status_pengerjaan}}</td>
                <td> Rp. {{number_format($key->total,2,',','.')}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Data Kosong</td>
            </tr>
            @endforelse
            <tr>
                <td colspan="3">Total :</td>
                <td>Rp. {{number_format($total,2,',','.')}}</td>
            </tr>
        </tbody>
    </table>
    <p>Jumlah Transaksi Berhasil : <strong>{{ $jumlahtransaksi }}</strong> Transaksi</p>
    <p>Jumlah Estimasi Pemasukkan : <strong>Rp. {{number_format($total,2,',','.')}}</strong></p>
    <p></p>
</body>

</html>