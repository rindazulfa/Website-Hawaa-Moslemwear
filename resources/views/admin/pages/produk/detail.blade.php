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
                            <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
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
                    <h3 class="mb-0">Detail Produk</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <img src="{{asset('/uploads/products/'.$detail->pict_1)}}" width="50%" class="rounded float-left" alt="...">
                        </div>
                        <div class="col-lg-3">
                            <img src="{{asset('/uploads/products/'.$detail->pict_2)}}" width="50%" class="rounded float-left" alt="...">
                        </div>
                        <div class="col-lg-3">
                            <img src="{{asset('/uploads/products/'.$detail->pict_3)}}" width="50%" class="rounded float-left" alt="...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Nama Produk</label>
                            <h4 class="card-title">{{$detail->name}}</h4>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Size</label>
                            @forelse ($detail->stok as $key)
                            <h4 class="card-title">{{ $key->size }} </h4>
                            <!-- <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{ $key->size }} </span> -->

                            @empty
                            <h4 class="card-title">Tidak Tersedia</h4>
                            @endforelse
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Kategori</label>
                            <h4 class="card-title">{{$detail->category}}</h4>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Deskripsi</label>
                            <p class="card-text">{{$detail->desc}}</p>
                        </div>
                    </div>
                    <!-- <a href="/produk" class="btn btn-primary">Kembali</a> -->
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="mb-0">Resep Produk</h3>
                    <div class="float-right">
                        <a href="{{route('form_resep',[$detail->id])}}" class="btn btn-primary">Tambah Bahan</a>
                        <a href="/produk" class="btn btn-neutral">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="no">ID</th>
                                    <th>Nama Produk</th>
                                    <th>Nama Bahan</th>
                                    <th>QTY</th>
                                    <th>Satuan</th>
                                    <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($resep as $key)
                                <tr>
                                    <td>{{$key->id}}</td>
                                    <td>{{$key->material->name}}</td>
                                    <td>{{$key->qty}}</td>
                                    <td>{{$key->satuan}}</td>
                                    <td>
                                        <a href="{{route('resep.edit',[$key->id])}}" class="btn btn-outline-primary" title="Edit">
                                            Update
                                        </a>
                                        <button class="btn btn-outline-danger delete" value="{{ $key->id }}" data-toggle="modal" data-target="#exampleModal-{{$key->id}}" title="Delete">Delete</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal-{{$key->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('resep.destroy', [$key->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-content">
                                                <div class="modal-header py-5">
                                                    <h2 class="modal-title" id="exampleModalLabel"> Hapus Resep</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>
                                                        Yakin menghapus data {{ $key->material->name}} ?
                                                    </h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger font-weight-bold text-uppercase">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @empty

                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection