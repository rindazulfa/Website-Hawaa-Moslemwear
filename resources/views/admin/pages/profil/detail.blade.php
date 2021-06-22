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
                            <li class="breadcrumb-item"><a href="/profilumkm">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Profil UMKM</li>
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
                    <h3 class="mb-0">Detail Profil UMKM</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <img src="{{asset('/uploads/profil/'.$detail->picture)}}" width="50%" class="rounded float-left" alt="...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Telepon</label>
                            <h4 class="card-title">{{$detail->telepon}}</h4>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Email</label>
                            <h4 class="card-title">{{ $detail->email }} </h4>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                           <label>Instagram</label>
                            <h4 class="card-title">{{$detail->ig}}</h4>
                        </div> 
                        <div class="col-lg-6">
                            <label for="">Alamat</label>
                            <p class="card-text">{{$detail->address}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">  
                           <label>Deskripsi 1</label>
                            <p class="card-text">{{$detail->desc_1}}</p>
                        </div> 
                        <div class="col-lg-6">
                            <label for="">Deskripsi 2</label>
                            <p class="card-text">{{$detail->desc_2}}</p>
                        </div>
                    </div>
                    <a href="/profilumkm" class="btn btn-primary">Kembali</a>
                </div>
            </div>
         

        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection