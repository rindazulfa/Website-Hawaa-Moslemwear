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
                    <h3 class="mb-0">Form Edit Supplier</h3>
                </div>
                <form class="form" method="post" action="{{route('supplier.update',[$page->id])}}" enctype="multipart/form-data">
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
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{ $page->name }}" name="name" placeholder="Masukkan Nama" />
                            </div>
                            <div class="col-lg-6 mt-4">
                                <label>Telepon</label>
                                <input type="text" class="form-control" value="{{ $page->phone }}" name="phone" placeholder="Masukkan Telepon" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 mt-4">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $page->email }}" name="email" placeholder="Masukkan Email" />
                            </div>
                            <!-- <div class="col-lg-6 mt-4">
                                <label>Nama Bahan Baku</label>
                                <select class="form-control" required name="materials_id">
                                    @foreach($items as $key)
                                    <option @if($page->materials_id==$key->id) selected @endif value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                </select>
                            </div> -->
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 mt-4">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" name="address" placeholder="Masukkan Alamat">{{ $page->address }}</textarea>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('supplier.index')}}">Cancel</a></button>
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