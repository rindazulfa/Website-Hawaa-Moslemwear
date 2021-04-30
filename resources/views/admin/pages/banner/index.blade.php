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
                            <li class="breadcrumb-item active" aria-current="page">Daftar Banner</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('banner.create')}}" class="btn btn-sm btn-neutral">Tambah Banner</a>
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
                    <h3 class="mb-0">Daftar Banner</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="no">No. </th>
                                <th scope="col" class="sort" data-sort="id_Banner">Id Banner</th>
                                <th scope="col" class="sort" data-sort="nama_Banner">Gambar 1</th>
                                <th scope="col" class="sort" data-sort="harga_Banner">Gambar 2</th>
                                <th scope="col" class="sort" data-sort="stok_Banner">Gambar 3</th>
                                <th scope="col" class="sort" data-sort="jenis_Banner">Judul</th>
                                <th scope="col" class="sort" data-sort="deskripsi_Banner">Sub Judul</th>
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_Banner">Gambar 1</td>
                                <td class="nama_Banner">Gambar 2</td>
                                <td class="harga_Banner">Gambar 3</td>
                                <td class="stok_Banner">LifeStyle</td>
                                <td class="deskripsi_Banner">Lorem ipsuxxxx</td>
                            
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-primary">Update</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_Banner">Gambar 1</td>
                                <td class="nama_Banner">Gambar 2</td>
                                <td class="harga_Banner">Gambar 3</td>
                                <td class="stok_Banner">LifeStyle</td>
                                <td class="deskripsi_Banner">Lorem ipsuxxxx</td>
                            
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-primary">Update</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_Banner">Gambar 1</td>
                                <td class="nama_Banner">Gambar 2</td>
                                <td class="harga_Banner">Gambar 3</td>
                                <td class="stok_Banner">LifeStyle</td>
                                <td class="deskripsi_Banner">Lorem ipsuxxxx</td>
                            
                                <td class="aksi">
                                    <button type="button" class="btn btn-outline-primary">Update</button>
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