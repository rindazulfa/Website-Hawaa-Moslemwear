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
        <h5>Laporan PDF Produksi</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Tanggal Produksi</th>
                <th>Nama Produk</th>
                <th>Jumlah Produksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produksi as $key)
            <tr>
                <td>{{$key->date}}</td>
                <td>{{$key->name}}</td>
                <td> {{ $key->qty }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Data Kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>