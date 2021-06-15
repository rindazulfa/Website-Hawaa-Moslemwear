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
                            <li class="breadcrumb-item"><a href="/customer">Data Customer</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Edit Data Customer</li>
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
                    <h3 class="mb-0">Form Customer</h3>
                </div>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="form" method="POST" action="{{route('custupdate', [$items->id])}}">
                    {{-- @method('PUT') --}}
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Nama Depan</label>
                                <input type="text" class="form-control" name="first_name" value="{{$items->first_name}}" disabled/>
                            </div>
                            <div class="col-lg-6">
                                <label>Nama Belakang</label>
                                <input type="text" class="form-control" name="last_name" value="{{$items->last_name}}" disabled/>
                            </div>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-lg-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$items->email}}" disabled/>
                            </div>
                            <div class="col-lg-6">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="address" placeholder="Masukkan Address" value="{{$items->address}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="exampleTextarea">Kota</label>
                                <input type="text" class="form-control" name="city" value="{{$items->city}}"/>
                            </div>
                            <div class="col-lg-6">
                                <label for="exampleTextarea">Provinsi</label>
                                <input type="text" class="form-control" name="province" value="{{$items->province}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="exampleTextarea">No Telepon</label>
                                <input type="text" class="form-control" name="phone" value="{{$items->phone}}" /> </div>
                            <div class="col-lg-6">
                                <label for="exampleTextarea">Kode POS</label>
                                <input type="text" class="form-control" name="postal_code" value="{{$items->postal_code}}"/>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('customer.index')}}">Cancel</a></button>
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