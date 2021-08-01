@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Produk</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('produk.create')}}" class="btn btn-sm btn-neutral">Tambah Produk</a>
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
                                <th>Gambar</th>
                                <!-- <th>Size</th> -->
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($produk as $key)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="avatar rounded-circle mr-3">
                                            <img src="{{asset('/uploads/products/'.$key->pict_1)}}" alt="photo">
                                        </div>
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$key->name}}</span>
                                        </div>
                                    </div>
                                </th>
                              
                                <td> Rp {{number_format($key->price,2,',','.')}}</td>
                                <td>{{$key->kategori->name}}</td>
                                <!-- <td>{{$key->desc}}</td> -->
                                <td>
                                    <a href="{{route('produk.show',[$key->id])}}" class="btn btn-outline-primary" title="Detail">
                                        Detail
                                    </a>
                                    <a href="{{route('produk.edit',[$key->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Ubah
                                    <!-- </a>
                                    <button class="btn btn-outline-danger delete" value="{{ $key->id }}" data-toggle="modal" data-target="#exampleModal-{{$key->id}}" title="Delete">Delete</button> -->
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