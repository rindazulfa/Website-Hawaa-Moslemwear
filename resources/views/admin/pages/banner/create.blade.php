@extends('admin.layouts.app')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Banner</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/banner">Daftar Banner</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Data Banner</li>
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
                        <h3 class="mb-0">Form Banner</h3>
                    </div>
                
                    <form class="form" method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
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
                                <!-- Pict 1 -->
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                        <input type="file" name="picture" accept=".png, .jpg, .jpeg"
                                            class="custom-file-input" id="customFileLang" lang="en">
                                        <input type="hidden" name="id" value="{{ old('picture') }}" required/>
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6 mt-4">
                                    <label>Title</label>
                                    <input type="text" class="form-control" value="{{ old('title') }}" name="title" 
                                        placeholder="Masukkan Judul" required/>
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <label>Sub Title</label>
                                    <input type="text" class="form-control" value="{{ old('sub_title') }}"
                                        name="sub_title" placeholder="Masukkan Sub Judul" required  />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                    <button type="button" class="btn btn-secondary"><a
                                            href="{{ route('banner.index') }}">Kembali</a></button>
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
