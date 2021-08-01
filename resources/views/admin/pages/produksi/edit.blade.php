@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Produksi</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/produksi">Daftar Produksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Edit Produksi</li>
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
                    <h3 class="mb-0">Form Edit Produksi</h3>
                </div>
                <form class="form" method="post" action="{{route('produksi.update',[$page->id])}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field("PUT")}}
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-lg-6 mt-4">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" value="{{$page->id_products}}" name="name" placeholder="Masukkan Nama" readonly/>
                            </div>
                            <div class="col-lg-6 mt-4">
                                <label>Jumlah Produksi</label>
                                <input type="number" class="form-control" value="{{$page->qty}}" name="jumlah" placeholder="Jumlah Produksi" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 mt-4">
                                <label>Tanggal Produksi</label>
                                <input type="text" class="form-control" value="{{$page->date}}" name="date_awal" placeholder="tanggal_produksi" readonly/>
                            </div>
                            <!-- <div class="col-lg-6 mt-4">
                                <label>Tanggal Jadi</label>
                                <input type="date" class="form-control" value="" name="date_akhir" placeholder="tanggal_jadi" />
                            </div> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('produksi.index')}}">Kembali</a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection