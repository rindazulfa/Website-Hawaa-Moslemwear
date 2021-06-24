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
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/stok_produk">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tables</li>
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
                    <h3 class="mb-0">Form Stok Produk</h3>
                </div>
                <form class="form" method="post" action="{{route('stok_produk.update', [$edit->id])}}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <!--end: Code-->
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                        </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="col-form-label">Nama Produk</label>
                                <input type="text" name="name" readonly class="form-control" value="{{$product->name}}" />
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Size Produk</label>
                                <input type="text" name="size" readonly class="form-control" value="{{$edit->size}}" />
                            </div>
       

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>QTY</label>
                                <input type="number" class="form-control" value="{{$edit->qty}}" name="qty" />
                            </div>
                            <div class="col-lg-6">
                                <label>Satuan</label>
                                <input type="text" class="form-control" value="{{$edit->satuan}}" name="satuan" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('stok_produk.index')}}">Cancel</a></button>
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