@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Stok Produk</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            {{-- <li class="breadcrumb-item"><a href="/stok_produk">Daftar</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Daftar Stok Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('stok_produk.create')}}" class="btn btn-sm btn-neutral">Tambah Stok Produk</a>
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
                    <h3 class="mb-0">Daftar Stok Produk</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    @if ($message = Session::get('info'))
                    <div class="alert alert-info alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id_produk">Id</th>
                                <th scope="col" class="sort" data-sort="nama_produk">Nama Produk</th>
                                <th scope="col" class="sort" data-sort="nama_produk">Size</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Stok</th>
                                {{-- <th scope="col" class="sort" data-sort="harga_produk">Satuan</th> --}}
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($items as $key)
                            <tr>
                                <td>{{$key->id}}</td>
                                <td>{{$key->product->name}}</td>
                                <td>{{$key->size}}</td>
                                <td>{{$key->qty}} pcs</td>
                                {{-- <td>{{$key->satuan}}</td> --}}
                                <td class="aksi">
                                    <a href="{{route('stok_produk.show',[$key->id])}}" class="btn btn-outline-primary" title="Detail">
                                        Komposisi
                                    </a>
                                    <!-- <a href="{{route('stok_produk.edit',[$key->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Update
                                    </a> -->
                                    <a href="{{route('produksi.show',[$key->id])}}" class="btn btn-outline-primary" title="Produksi">
                                        Produksi
                                    </a>
                                    <!-- <button class="btn btn-outline-danger delete" value="{{ $key->id }}" data-toggle="modal" data-target="#exampleModal-{{$key->id}}" title="Delete">Delete</button> -->

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
                {{-- <div class="card-footer py-4">
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
                </div> --}}
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection