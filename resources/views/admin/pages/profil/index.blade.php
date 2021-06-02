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
                            <li class="breadcrumb-item active" aria-current="page">Daftar Profil UMKM</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('profilumkm.create')}}" class="btn btn-sm btn-neutral">Tambah Profil UMKM</a>
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
                    <h3 class="mb-0">Daftar Profil UMKM</h3>
                    <p class="mb-0">Note : Profile UMKM yang ditampilkan pada website hanya yang paling atas </p>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id_produk">Id</th>
                                <th scope="col" class="sort" data-sort="nama_produk">Gambar</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Telepon</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Alamat</th>
                                <th scope="col" class="sort" data-sort="stok_produk">Instagram</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Deskripsi 1</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Deskripsi 2</th>
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($page as $item)
                            <tr>
                                <td class="id_produk">{{$item->id}}</td>
                                <td>
                                    <div class="avatar rounded-circle mr-3">
                                        <img src="{{asset('/uploads/profil/'.$item->picture)}}" alt="photo">
                                    </div>
                                </td>
                                {{-- <td >{{$item->subtitle}}</td> --}}
                                <td >{{$item->telepon}}</td>
                                <td >{{$item->address}}</td>
                                <td >{{$item->ig}}</td>
                                <td >{{$item->desc_1}}</td>
                                <td >{{$item->desc_2}}</td>
                                <td>
                                    <a href="{{route('banner.edit',[$item->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Update
                                    </a>
                                    <!-- <button type="button" class="btn btn-outline-primary">Update</button> -->
                                    <button class="btn btn-outline-danger delete" data-id="{{$item->id}}">Delete</button>
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