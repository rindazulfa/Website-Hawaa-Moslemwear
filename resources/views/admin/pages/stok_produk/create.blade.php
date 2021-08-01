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
                            <li class="breadcrumb-item"><a href="/stok_produk">Daftar Stok Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Tambah Stok Produk</li>
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
                    <h3 class="mb-0">Form Tambah Stok Produk</h3>
                </div>
                <form class="form" method="post" action="{{route('stok_produk.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                        </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Pilih Produk</label>
                                <select class="form-control" required name="products_id">
                                    @foreach($items as $key)
                                    <option value="{{ $key->id }}" >{{ $key->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Size</label>
                                <!-- <span class="form-text text-muted">Pilih Ukuran</span> -->
                                <div class="radio-inline">
                                    <label class="radio radio-solid">
                                        <input type="radio" name="size" checked="checked" value="S" required/>
                                        <span></span>
                                        S
                                    </label>
                                    <label class="radio radio-solid">
                                        <input type="radio" name="size" value="M" required/>
                                        <span></span>
                                        M
                                    </label>
                                    <label class="radio radio-solid">
                                        <input type="radio" name="size" value="L" required />
                                        <span></span>
                                        L
                                    </label>
                                    <label class="radio radio-solid">
                                        <input type="radio" name="size" value="XL" required/>
                                        <span></span>
                                        XL
                                    </label>
                                    <label class="radio radio-solid">
                                        <input type="radio" name="size" value="XXL" required />
                                        <span></span>
                                        XXL
                                    </label>
                                </div>
                        
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Stok</label>
                                <input type="number" class="form-control" value="{{ old('qty') }}" required name="qty" />
                            </div>
                            <div class="col-lg-6">
                                <label>Satuan</label>
                                <input type="text" class="form-control" value="pcs" readonly name="satuan" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('stok_produk.index')}}">Kembali</a></button>
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