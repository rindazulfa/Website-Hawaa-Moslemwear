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
                            <li class="breadcrumb-item active" aria-current="page">Daftar Transaksi Pembelian</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('datatranspembelian.create')}}" class="btn btn-sm btn-neutral">Tambah Pembelian</a>
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
                    <h3 class="mb-0">Daftar Transaksi Pembelian</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="no">No. </th>
                                <th scope="col" class="sort" data-sort="id_transaksi_pembelian">Id Transaksi Pembelian</th>
                                <th scope="col" class="sort" data-sort="nama_bahan_baku">Nama Bahan Baku</th>
                                <th scope="col" class="sort" data-sort="jumlah_beli">Jumlah Beli</th>
                                <th scope="col" class="sort" data-sort="harga_bahan">Harga Bahan</th>
                                <th scope="col" class="sort" data-sort="total_harga">Total Harga</th>
                                <th scope="col" class="sort" data-sort="status">status Transaksi</th>
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_transaksi_pembelian">TB001</td>
                                <td class="nama_bahan_baku">Kain</td>
                                <td class="jumlah_beli">10 Meter</td>
                                <td class="harga_bahan">Rp. 100.000</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-success"></i>
                                        <span class="status">success</span>
                                    </span>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Cetak</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">2.</th>
                                <td class="id_transaksi_pembelian">TB002</td>
                                <td class="nama_bahan_baku">Benang</td>
                                <td class="jumlah_beli">10 Meter</td>
                                <td class="harga_bahan">Rp. 100.000</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">pending</span>
                                    </span>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Cetak</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">3.</th>
                                <td class="id_transaksi_pembelian">TB003</td>
                                <td class="nama_bahan_baku">Pewarna</td>
                                <td class="jumlah_beli">10 Liter</td>
                                <td class="harga_bahan">Rp. 100.000</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">Cancel</span>
                                    </span>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Cetak</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">4.</th>
                                <td class="id_transaksi_pembelian">TB004</td>
                                <td class="nama_bahan_baku">Kain</td>
                                <td class="jumlah_beli">10 Meter</td>
                                <td class="harga_bahan">Rp. 100.000</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-success"></i>
                                        <span class="status">success</span>
                                    </span>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Cetak</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">5.</th>
                                <td class="id_transaksi_pembelian">TB005</td>
                                <td class="nama_bahan_baku">Kain</td>
                                <td class="jumlah_beli">10 Meter</td>
                                <td class="harga_bahan">Rp. 100.000</td>
                                <td class="total_harga">Rp. 1.000.000</td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-success"></i>
                                        <span class="status">success</span>
                                    </span>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-success">Cetak</button>
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