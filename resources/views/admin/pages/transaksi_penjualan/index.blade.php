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
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Transaksi Penjualan</li>
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
                    <h3 class="mb-0">Daftar Transaksi Penjualan</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="no">No. </th>
                                <th scope="col" class="sort" data-sort="id_transaksi_penjualan">Id Transaksi Penjualan</th>
                                <th scope="col" class="sort" data-sort="tanggal_transaksi">Tanggal Transaksi</th>
                                <th scope="col" class="sort" data-sort="nama_produk">Nama Produk</th>
                                <th scope="col" class="sort" data-sort="jumlah_jual">Jumlah Jual</th>
                                <th scope="col" class="sort" data-sort="size_jual">Size Jual</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Harga Produk</th>
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
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_transaksi_penjualan">TJ001</td>
                                <td class="tanggal_transaksi">Kain</td>
                                <th class="nama_produk">Gamis</th>
                                <td class="jumlah_jual">1 Set</td>
                                <td class="size_jual">L</td>
                                <td class="harga_produk">Rp. 200.000</td>
                                <td class="shipping">JNE</td>
                                <td class="ongkir">Rp. 50.000</td>
                                <td class="keterangan">Rumah Cat Hijau</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td class="status">
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-info"></i>
                                        <span class="status">Menunggu Konfirmasi</span>
                                    </span>
                                </td>
                                <td class="bukti_pembayaran">
                                    <a href="#">Bukti_Transfer_TJ001.jpg</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Terima</button>
                                    <button type="button" class="btn btn-outline-warning">Tolak</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_transaksi_penjualan">TJ001</td>
                                <td class="tanggal_transaksi">Kain</td>
                                <th class="nama_produk">Gamis</th>
                                <td class="jumlah_jual">1 Set</td>
                                <td class="size_jual">L</td>
                                <td class="harga_produk">Rp. 200.000</td>
                                <td class="shipping">JNE</td>
                                <td class="ongkir">Rp. 50.000</td>
                                <td class="keterangan">Rumah Cat Hijau</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td class="status">
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-info"></i>
                                        <span class="status">Menunggu Konfirmasi</span>
                                    </span>
                                </td>
                                <td class="bukti_pembayaran">
                                    <a href="#">Bukti_Transfer_TJ001.jpg</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Terima</button>
                                    <button type="button" class="btn btn-outline-warning">Tolak</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_transaksi_penjualan">TJ001</td>
                                <td class="tanggal_transaksi">Kain</td>
                                <th class="nama_produk">Gamis</th>
                                <td class="jumlah_jual">1 Set</td>
                                <td class="size_jual">L</td>
                                <td class="harga_produk">Rp. 200.000</td>
                                <td class="shipping">JNE</td>
                                <td class="ongkir">Rp. 50.000</td>
                                <td class="keterangan">Rumah Cat Hijau</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td class="status">
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-info"></i>
                                        <span class="status">Menunggu Konfirmasi</span>
                                    </span>
                                </td>
                                <td class="bukti_pembayaran">
                                    <a href="#">Bukti_Transfer_TJ001.jpg</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Terima</button>
                                    <button type="button" class="btn btn-outline-warning">Tolak</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_transaksi_penjualan">TJ001</td>
                                <td class="tanggal_transaksi">Kain</td>
                                <th class="nama_produk">Gamis</th>
                                <td class="jumlah_jual">1 Set</td>
                                <td class="size_jual">L</td>
                                <td class="harga_produk">Rp. 200.000</td>
                                <td class="shipping">JNE</td>
                                <td class="ongkir">Rp. 50.000</td>
                                <td class="keterangan">Rumah Cat Hijau</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td class="status">
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-info"></i>
                                        <span class="status">Menunggu Konfirmasi</span>
                                    </span>
                                </td>
                                <td class="bukti_pembayaran">
                                    <a href="#">Bukti_Transfer_TJ001.jpg</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Terima</button>
                                    <button type="button" class="btn btn-outline-warning">Tolak</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_transaksi_penjualan">TJ001</td>
                                <td class="tanggal_transaksi">Kain</td>
                                <th class="nama_produk">Gamis</th>
                                <td class="jumlah_jual">1 Set</td>
                                <td class="size_jual">L</td>
                                <td class="harga_produk">Rp. 200.000</td>
                                <td class="shipping">JNE</td>
                                <td class="ongkir">Rp. 50.000</td>
                                <td class="keterangan">Rumah Cat Hijau</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td class="status">
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-info"></i>
                                        <span class="status">Menunggu Konfirmasi</span>
                                    </span>
                                </td>
                                <td class="bukti_pembayaran">
                                    <a href="#">Bukti_Transfer_TJ001.jpg</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Terima</button>
                                    <button type="button" class="btn btn-outline-warning">Tolak</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
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