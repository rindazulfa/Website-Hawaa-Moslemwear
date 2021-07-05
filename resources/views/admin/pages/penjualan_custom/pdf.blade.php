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
        <h5>Laporan PDF Penjualan Custom</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Tanggal Transaksi</th>
                <th>Status Transaksi</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($custom as $key)
            <tr>
                <td>{{$key->date}}</td>
                <td>{{$key->status_pengerjaan}}</td>
                <td> Rp. {{number_format($key->total,2,',','.')}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Data Kosong</td>
            </tr>
            @endforelse
            <tr>
                <td colspan="2">Total :</td>
                <td>Rp. {{number_format($total,2,',','.')}}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>