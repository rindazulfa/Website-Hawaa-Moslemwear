@extends('layouts.app')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">History</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>History Order</span></p>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 ftco-animate">
                <h3>Informasi Order</h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id Order</th>
                            <th>Status Pesanan</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cek as $key)
                        <tr>
                            <td>{{ $key->id }}</td>
                            <td>
                                <?php
                                if ($key->status == "Menunggu Pembayaran") {
                                    echo "Menunggu Pembayaran Anda";
                                } else if ($key->status == "Menunggu Konfirmasi Pembayaran") {
                                    echo "Data Diterima, Harap menunggu konfirmasi pembayaran";
                                } else if ($key->status == "Selesai") {
                                    echo "Terima Kasih";
                                } else {
                                    echo "Pesanan Di tolak";
                                }
                                ?>
                            </td>
                            <td>{{ $key->total }}</td>
                            <td>
                                <?php
                                if ($key->status == "Menunggu Pembayaran") { ?>
                                    <a href="checkout/{{$key->id}}/edit" class="btn btn-primary py-3 px-3">
                                        Bayar Sekarang
                                    </a>
                                    <br><br>
                                    <a href="{{ route('del.his', [$key->id]) }}" class="btn btn-warning py-3 px-3">
                                        Batalkan
                                    </a>
                                <?php
                                } else if ($key->status == "Menunggu Konfirmasi Pembayaran") {
                                    echo "Data Diterima, Harap menunggu konfirmasi pembayaran";
                                } else if ($key->status == "Selesai") { ?>
                                    <a href="https://wa.me/087701401325?text=Halo, Saya {{ $key->first_name }}" class="btn btn-success py-3 px-5" target="_blank">
                                        Silahkan Hubungi Admin
                                    </a>
                                <?php
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
        </div>
        @forelse($cek as $key)
        <div class="row d-flex mt-5 contact-info">
            <div class="col-md-4 d-flex">

            </div>
            <div class="col-md-4 d-flex">
                <div class="info bg-white p-4">
                    <p><span><strong>Status Pesanan :</strong></span></p>
                    <br>
                    <h3><strong>{{ $key->status }}</strong></h3>
                </div>
            </div>
            <div class="col-md-4 d-flex">

            </div>
        </div>
        @empty
        <div class="row d-flex mt-5 contact-info">
            <div class="col-md-4 d-flex">

            </div>
            <div class="col-md-4 d-flex">
                <div class="info bg-white p-4">
                    <p><span><strong>Status Pesanan :</strong></span></p>
                    <br>
                    <h3><strong>Data tidak tersedia</strong></h3>
                </div>
            </div>
            <div class="col-md-4 d-flex">

            </div>
        </div>
        @endforelse
    </div>
</section>
@endsection