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
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cek as $key)
                        <tr>
                            <td>{{ $key->id }}</td>
                            <td>
                                <?php
                                if ($key->status_pengerjaan == "Menunggu Persetujuan Desain") {
                                    echo "Menunggu Status Pengajuan Desain";
                                } else if ($key->status_pengerjaan == "Menunggu Data Order") {
                                    echo "Desain Diterima, Silahkan Melanjutkan Transaksi";
                                } else if ($key->status_pengerjaan == "Menunggu Harga") {
                                    echo "Data Diterima, Silahkan Menunggu Total Harga";
                                } else if ($key->status_pengerjaan == "Menunggu Proses Pembayaran") {
                                    echo "Data Diterima, Silahkan Melanjutkan Transaksi";
                                } else if ($key->status_pengerjaan == "Menunggu Konfirmasi Pembayaran") {
                                    echo "Data Diterima, Harap menunggu konfirmasi pembayaran";
                                } else if ($key->status_pengerjaan == "Selesai") {
                                    echo "Terima Kasih";
                                } else {
                                    echo "Pesanan Di batalkan";
                                }
                                ?>
                            </td>
                            <td>Rp. {{number_format($key->total,2,',','.')}}</td>
                            <td>{{ $key->status_pembayaran }}</td>
                            <td>
                                <?php
                                if ($key->status_pengerjaan == "Menunggu Persetujuan Desain") {
                                    echo "Menunggu Status Pengajuan Desain";
                                } else if ($key->status_pengerjaan == "Menunggu Data Order") {
                                    ?>
                                    <a href="/custom/{{$key->id}}" class="btn btn-primary py-3 px-3">
                                        Lanjutkan Transaksi
                                    </a>
                                    <br><br>
                                    <a href="/custom/status/den/{{ $key->id }}" class="btn btn-warning py-3 px-3">Batalkan</a>
                                    <!-- <a href="{{route('custom.destroy', [$key->id])}}" class="btn btn-warning py-3 px-3">
                                        Batalkan
                                    </a> -->
                                <?php
                                } else if ($key->status_pengerjaan == "Menunggu Proses Pembayaran") { ?>
                                    <a href="custom/{{$key->id}}/edit" class="btn btn-primary py-3 px-3">
                                        Bayar Sekarang
                                    </a>
                                    <br><br>
                                    <a href="/custom/status/den/{{ $key->id }}" class="btn btn-warning py-3 px-3">Batalkan</a>
                                    <!-- <a href="{{route('custom.destroy', [$key->id])}}" class="btn btn-warning py-3 px-3">
                                        Batalkan
                                    </a> -->
                                <?php
                                } else if ($key->status_pengerjaan == "Selesai") {
                                    ?>
                                    <a href="{{route('invoice_custom', [$key->id])}}" class="btn btn-light py-3 px-3">
                                        Cetak Invoice
                                    </a>
                                    <a href="https://wa.me/{{ $data->telepon }}?text=Halo, Saya {{ $key->first_name }}" class="btn btn-success py-3 px-5" target="_blank">
                                        Silahkan Hubungi Admin
                                    </a>
                                <?php
                                } else if ($key->status_pengerjaan == "Menunggu Harga") {
                                    ?>
                                    Silahkan Menunggu Konfirmasi Harga
                                <?php
                                } else if ($key->status_pengerjaan == "Menunggu Konfirmasi Pembayaran") {
                                    ?>
                                    Silahkan Menunggu konfirmasi Pembayaran
                                <?php
                                } else {
                                    echo "Pesanan Di batalkan";
                                    ?>
                                    <a href="https://wa.me/{{ $data->telepon }}?text=Halo, Saya {{ $key->first_name }}" class="btn btn-success py-3 px-5" target="_blank">
                                        Silahkan Hubungi Admin
                                    </a>
                                <?php
                                }
                                ?>
                                <!-- <input type="submit" value="Ajukan Desain" class="btn btn-primary py-3 px-5"> -->
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
        <!-- <div class="row d-flex mt-5 contact-info">
            <div class="w-100"></div>
            <div class="col-md-4 d-flex">
                <div class="info bg-white p-4">
                    <p><span><strong>Status Pengerjaan Desain :</strong></span></p>
                    <br>
                    <h3><strong>{{ $key->status_pengerjaan }}</strong></h3>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="info bg-white p-4">
                    <p><span><strong>Status Pembayaran :</strong></span></p>
                    <br>
                    <h3><strong>{{ $key->status_pengerjaan }}</strong></h3>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="info bg-white p-4">
                    <p><span><strong>Status Pesanan :</strong></span></p>
                    <br>
                    <h3><strong>{{ $key->status_pengerjaan }}</strong></h3>
                </div>
            </div>
        </div> -->
    </div>
</section>
@endsection