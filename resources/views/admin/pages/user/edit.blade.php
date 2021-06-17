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
                    <h3 class="mb-0">Form Edit User</h3>
                </div>
                <form class="form" method="post" action="{{route('user.update',[$page->id])}}" enctype="multipart/form-data">
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
                                <label>Nama Depan</label>
                                <input type="text" class="form-control" value="{{ $page->first_name }}" name="first_name" placeholder="Masukkan Nama Depan" />
                            </div>
                            <div class="col-lg-6 mt-4">
                                <label>Nama Belakang</label>
                                <input type="text" class="form-control" value="{{ $page->last_name }}" name="last_name" placeholder="Masukkan Nama Belakang" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 mt-4">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $page->email }}" name="email" placeholder="Masukkan Email" readonly />
                            </div>
                            <div class="col-lg-6 mt-4">
                                <label>Password</label>
                                <input type="password" class="form-control" value="" name="password" placeholder="Masukkan Password" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mt-4">
                                <label>Roles</label>
                                <input type="text" class="form-control" value="{{ $page->role }}" name="role" placeholder="Masukkan Role" />
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('user.index')}}">Cancel</a></button>
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