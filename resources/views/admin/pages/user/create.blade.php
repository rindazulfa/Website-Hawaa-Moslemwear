@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">User</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/user">Daftar User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Tambah User</li>
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
                    <h3 class="mb-0">Form Tambah User</h3>
                </div>
                <form class="form" method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                    @csrf
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
                                <input type="text" class="form-control" name="first_name" placeholder="Masukkan Nama Depan" />
                            </div>
                            <div class="col-lg-6 mt-4">
                                <label>Nama Belakang</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Masukkan Nama Belakang" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Masukkan Email" />
                            </div>
                            <div class="col-lg-6">
                                <label>Pilih Roles</label>
                                <select class="form-control" required name="role">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mt-4">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Masukkan Password" />
                            </div>
                            <!-- <div class="col-lg-6 mt-4">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Masukkan Password" />
                            </div> -->
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('user.index')}}">Kembali</a></button>
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