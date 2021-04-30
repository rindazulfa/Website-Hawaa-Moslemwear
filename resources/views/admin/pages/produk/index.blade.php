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
                            <li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('dataproduk.create')}}" class="btn btn-sm btn-neutral">Tambah Produk</a>
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
                    <h3 class="mb-0">Daftar Produk</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="no">No. </th>
                                <th scope="col" class="sort" data-sort="id_produk">Id Produk</th>
                                <th scope="col" class="sort" data-sort="nama_produk">Nama Produk</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Harga Produk</th>
                                <th scope="col" class="sort" data-sort="stok_produk">Stok Produk</th>
                                <th scope="col" class="sort" data-sort="jenis_produk">Jenis_Produk</th>
                                <th scope="col" class="sort" data-sort="deskripsi_produk">Deskripsi Produk</th>
                                <th scope="col" class="sort" data-sort="gambar_produk">Gambar Produk</th>
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_produk">P0001</td>
                                <td class="nama_produk">Gamis</td>
                                <td class="harga_produk">Rp. 300.000</td>
                                <td class="stok_produk">5 Set</td>
                                <td class="jenis_produk">Pakaian</td>
                                <td class="deskripsi_produk">Lorem ipsuxxxx</td>
                                <td class="gambar_produk">
                                    <a href="#">Gambar 1</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-primary">Update</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">2.</th>
                                <td class="id_produk">P0002</td>
                                <td class="nama_produk">Mukenah</td>
                                <td class="harga_produk">Rp. 300.000</td>
                                <td class="stok_produk">15 Set</td>
                                <td class="jenis_produk">Perlengkapan Sholat</td>
                                <td class="deskripsi_produk">Lorem ipsuxxxx</td>
                                <td class="gambar_produk">
                                    <a href="#">Gambar 1</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-primary">Update</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">3.</th>
                                <td class="id_produk">P0003</td>
                                <td class="nama_produk">Masker</td>
                                <td class="harga_produk">Rp. 30.000</td>
                                <td class="stok_produk">50 Pack</td>
                                <td class="jenis_produk">Aksesoris</td>
                                <td class="deskripsi_produk">Lorem ipsuxxxx</td>
                                <td class="gambar_produk">
                                    <a href="#">Gambar 1</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-primary">Update</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">4.</th>
                                <td class="id_produk">P0004</td>
                                <td class="nama_produk">Sajadah</td>
                                <td class="harga_produk">Rp. 200.000</td>
                                <td class="stok_produk">2 Set</td>
                                <td class="jenis_produk">Perlengkapan sholat</td>
                                <td class="deskripsi_produk">Lorem ipsuxxxx</td>
                                <td class="gambar_produk">
                                    <a href="#">Gambar 1</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-primary">Update</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">5.</th>
                                <td class="id_produk">P0005</td>
                                <td class="nama_produk">Gamis</td>
                                <td class="harga_produk">Rp. 300.000</td>
                                <td class="stok_produk">5 Set</td>
                                <td class="jenis_produk">Pakaian</td>
                                <td class="deskripsi_produk">Lorem ipsuxxxx</td>
                                <td class="gambar_produk">
                                    <a href="#">Gambar 1</a>
                                </td>
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-primary">Update</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
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