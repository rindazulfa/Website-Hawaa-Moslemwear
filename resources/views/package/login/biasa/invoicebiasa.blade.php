<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cetak</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 18cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url('uploads/banner/dimension.png');
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <!-- <div id="logo">
            <img src="logo.png">
        </div> -->
        <h1>INVOICE {{$id}} </h1>
        <div id="project" style="float:left;">
            <div>Hawaa Moslemwear</div>
            <div>Jl. Ketintang,<br /> Surabaya</div>
            <div>+62 811-3104-430</div>
            <div><a href="mailto:iniemail@gmail.com">iniemail@gmail.com</a></div>
        </div>
        <div id="project" style="float: right;">
            <div><span>Jenis Pesanan</span> Pembelian Produk </div>
            <div><span>Nama Pelanggan</span> {{$pelanggan[0]->first_name}}</div>
            <div><span>Alamat Pengiriman</span> {{$pelanggan[0]->address}}</div>
            <div><span>Kecamatan</span> {{$pelanggan[0]->kecamatan}}</div>
            <div><span>Kelurahan</span> {{$pelanggan[0]->kelurahan}}</div>
            <div><span>Kota</span> {{$pelanggan[0]->city}}</div>
            <div><span>No Telepon</span> {{$pelanggan[0]->phone}}</div>
            <div><span>Tanggal Pemesanan</span> {{$produk[0]->date}}</div>
            <div><span>Alamat Email</span> <a href="mailto:{{$pelanggan[0]->email}}">{{$pelanggan[0]->email}}</a></div>

        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">JENIS ORDER</th>
                    <th class="desc">Nama Produk</th>
                    <th>UKURAN</th>
                    <th>ONGKIR</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produk as $dp)
                <tr>
                    <td class="service">Pembelian Produk</td>
                    <td class="desc">{{ $dp->name }}</td>
                    <td>{{ $dp->size }}</td>
                    <td class="unit"> {{ $dp->ongkir }} </td>
                    <td class="unit"> {{ $dp->price }} </td>
                    <td class="qty"> {{ $dp->qty }}</td>
                    <td class="total">Rp. {{number_format($dp->subtotal,2,',','.')}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6">SUBTOTAL</td>
                    <td class="total">Rp. {{number_format($dp->total-$dp->ongkir,2,',','.')}} </td>
                </tr>
                <tr>
                <td colspan="6">ONGKIR</td>
                    <td class="total">Rp. {{number_format($dp->ongkir,2,',','.')}} </td>
                </tr>
                <tr>
                    <td colspan="6" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">Rp. {{number_format($dp->total,2,',','.')}}</td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div>Catatan:</div>
            <div class="notice">Barang yang sudah dikonfirmasi oleh admin tidak dapat diretur.</div>
        </div>
    </main>
    <footer>
        Invoice ini merupakan bukti pembelian anda harap dikirimkan melalui whatsapp admin.
    </footer>
</body>

</html>