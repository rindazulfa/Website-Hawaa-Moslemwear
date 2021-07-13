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
        <h1>INVOICE {{$custom[0]->id}}</h1>
        <div id="project" style="float:left;">
            <div>Hawaa Moslemwear</div>
            <div>Jl. Ketintang,<br /> Surabaya</div>
            <div>+62 811-3104-430</div>
            <div><a href="mailto:iniemail@gmail.com">iniemail@gmail.com</a></div>
        </div>
        <div id="project" style="float: right;">
            <div><span>Jenis Pesanan</span> Custom </div>
            <div><span>Nama Pelanggan</span> {{$pelanggan[0]->first_name}}</div>
            <div><span>Alamat Pengiriman</span> {{$pelanggan[0]->address}}</div>
            <div><span>No Telepon</span> {{$pelanggan[0]->phone}}</div>
            <div><span>Tanggal Pemesanan</span> {{$custom[0]->date}}</div>
            <div><span>Alamat Email</span> <a href="mailto:{{$pelanggan[0]->email}}">{{$pelanggan[0]->email}}</a></div>

        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">JENIS ORDER</th>
                    <th class="desc">DESKRIPSI</th>
                    <th>ONGKIR</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service">Custom</td>
                    <td class="desc">{{$custom[0]->keterangan}}</td>
                    <td class="unit">{{$custom[0]->ongkir}}</td>
                    <td class="unit">{{$custom[0]->harga}}</td>
                    <td class="qty">{{$custom[0]->qty}}</td>
                    <td class="total">Rp. {{number_format($custom[0]->total,2,',','.')}}</td>
                </tr>
                <tr>
                    <td colspan="5">SUBTOTAL</td>
                    <td class="total">Rp. {{number_format($custom[0]->total,2,',','.')}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">Rp. {{number_format($custom[0]->total,2,',','.')}}</td>
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