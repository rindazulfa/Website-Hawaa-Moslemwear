@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Penjualan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/penjualancustom">Daftar Transaksi Penjualan Custom</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Data Transaksi Penjualan Custom</li>
                        </ol>
                    </nav>
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
                    <h3 class="mb-0">Detail Penjualan Custom, Order Id : {{ $produk[0]->id }} </h3>
                </div>
                <form class="form" method="post" action="">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Id Order : {{ $produk[0]->id }}</label>
                            </div>
                            <div class="col-lg-6">
                                <label>Tanggal Order : <strong>{{ $produk[0]->tanggals }}</strong></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Nama Customer : <strong>{{ $pelanggan[0]->first_name }}</strong></label>
                            </div>
                            <div class="col-lg-6">
                                <label>Alamat Pengiriman : <strong>{{ $pelanggan[0]->address }} , {{ $pelanggan[0]->city }}</strong></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Status Pembayaran :
                                    <strong>
                                        <?php
                                        if ($produk[0]->status_pembayaran == 'Selesai') {
                                            ?>
                                            Telah dibayar
                                        <?php
                                        } else {
                                            ?>
                                            Belum dibayar
                                        <?php
                                        }
                                        ?>
                                    </strong></label>
                            </div>
                            <div class="col-lg-6">
                                <label>Jenis Pengiriman : <strong>{{ $produk[0]->shipping }}</strong></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="">Desain Produk</th>
                                        <th scope="col" class="sort" data-sort="">Size Produk</th>
                                        <th scope="col" class="sort" data-sort="">Jumlah Order</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @forelse($produk as $key)
                                    <tr>
                                        <td>
                                            <a href="{{asset('data_file/'.$key->pict_desain)}}" target="_blank">{{ $key->pict_desain }}</a>
                                        </td>
                                        <td>{{ $key->size }}</td>
                                        <td>{{ $key->qty }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="button" class="btn btn-secondary"><a href="{{route('penjualancustom.index')}}">Kembali</a></button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@include('admin.layouts.footer')
</div>
@endsection