@extends('admin.layouts.app')
@section('content')
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
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('penjualan.pdf')}}" class="btn btn-sm btn-neutral">Cetak PDF</a>
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
                                <th scope="col" class="sort" data-sort="id_transaksi_penjualan">Id Transaksi Penjualan</th>
                                <th scope="col" class="sort" data-sort="tanggal_transaksi">Tanggal Transaksi</th>
                                <th scope="col" class="sort" data-sort="shipping">Shipping</th>
                                <th scope="col" class="sort" data-sort="ongkir">Ongkir</th>
                                <th scope="col" class="sort" data-sort="keterangan">Keterangan</th>
                                <th scope="col" class="sort" data-sort="total_harga">Total</th>
                                <th scope="col" class="sort" data-sort="status">Status Transaksi</th>
                                <th scope="col" class="sort" data-sort="bukti_pembayaran">Bukti Pembayaran</th>
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col"></th>
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
                                        <span class="status">{{$key->status}}</span>
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
                                    } else if ($key->status == "Selesai") {
                                        echo "Selesai";
                                    } else {
                                        echo "Pesanan Di tolak";
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
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection