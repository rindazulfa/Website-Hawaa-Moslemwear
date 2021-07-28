@extends('admin.layouts.app')
@section('content')
<meta http-equiv="refresh" content="600">
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Transaksi Penjualan</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('penjualan.pdf')}}" class="btn btn-sm btn-neutral">Cetak PDF</a>
                </div> -->
                <div class="col-lg-6 col-1 text-right">
                    <form action="{{route('penjualan.pdf')}}" method="post">
                        @csrf
                        <input type="date" name="tglawal">
                        <input type="date" name="tglakhir">
                        <button type="submit" class="btn btn-sm btn-neutral">Cetak PDF</button>
                        <!-- <a href="" class="btn btn-sm btn-neutral">Cetak PDF</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Daftar Transaksi Penjualan</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id_transaksi_penjualan">ID</th>
                                <th scope="col" class="sort" data-sort="tanggal_transaksi">Tanggal Transaksi</th>
                                <th scope="col" class="sort" data-sort="shipping">Shipping</th>
                                <th scope="col" class="sort" data-sort="ongkir">Ongkir</th>
                                <th scope="col" class="sort" data-sort="keterangan">Keterangan</th>
                                <th scope="col" class="sort" data-sort="total_harga">Total</th>
                                <th scope="col" class="sort" data-sort="status">Status Transaksi</th>
                                <th scope="col" class="sort" data-sort="bukti_pembayaran">Bukti Pembayaran</th>
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col" class="sort" data-sort="detail">Detail</th>
                                <th scope="col" class="sort" data-sort="tanggal">Tanggal Pengiriman</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($page as $key)
                            <tr>
                                <td class="id_transaksi_penjualan">{{$key->id}}</td>
                                <td class="tanggal_transaksi">{{$key->date}}</td>
                                <td class="shipping">{{$key->shipping}}</td>
                                <td class="ongkir">{{$key->ongkir}}</td>
                                <td class="keterangan">{{$key->keterangan}}</td>
                                <td class="total_harga">{{$key->total}}</td>
                                <td class="status">
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-info"></i>
                                        <?php
                                        if ($key->status == 'Menunggu Harga') {
                                            ?>
                                            <span class="status">Menunggu Konfirmasi Harga</span>
                                        <?php
                                        } else {
                                            ?>
                                            <span class="status">{{$key->status}}</span>
                                        <?php
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td class="bukti_pembayaran">
                                    <a href="{{asset('uploads/bukti/'.$key->pict_payment)}}" target="_blank">
                                        {{ $key->pict_payment }}
                                    </a>
                                </td>
                                <td class="aksi">
                                    <?php if ($key->status == "Menunggu Pembayaran") {
                                        echo "Menunggu Pembayaran";
                                    } else if ($key->status == "Menunggu Konfirmasi Pembayaran") {
                                        ?>
                                        <button type="button" class="btn btn-outline-success">
                                            <a href="/confirmpaymentproduk/statuspay/acc/{{ $key->id }}">Terima</a>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger">
                                            <a href="/penjualan/statuspay/den/{{ $key->id }}">Tolak</a>
                                        </button>
                                    <?php
                                    } else if ($key->status == "Menunggu Harga") {
                                        ?>
                                        <button type="button" class="btn btn-outline-success">
                                            <a href="{{ route('cart.edit',[$key->id]) }}">Terima</a>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger">
                                            <a href="">Tolak</a>
                                        </button>
                                    <?php
                                    } else if ($key->status == "Selesai" && $key->tanggal_pengiriman == null) {
                                        echo "Sedang Di Proses";
                                    } else if ($key->status == "Selesai" && $key->tanggal_pengiriman != null) {
                                        echo "Pesanan Selesai";
                                    } else {
                                        echo "Pesanan Di batalkan";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary">
                                        <a href="{{ route('penjualan.show',[$key->id]) }}">Detail</a>
                                    </button>
                                </td>
                                <td>
                                    <!-- Tanggal Pengiriman -->
                                    <?php
                                    if ($key->status == "Selesai" && $key->tanggal_pengiriman == null) {
                                        ?>
                                        <button type="button" class="btn btn-outline-success">
                                            <a href="/penjualan/updatetanggal/{{ $key->id }}">Kirim</a>
                                        </button>
                                    <?php
                                    } else {
                                        ?>
                                        {{ $key->tanggal_pengiriman }}
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->

            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection