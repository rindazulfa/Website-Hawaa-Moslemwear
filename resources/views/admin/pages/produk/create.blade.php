@extends('admin.layouts.app')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Produk</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/produk">Daftar Produk</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Tambah Produk</li>
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
                        <h3 class="mb-0">Form Tambah Produk</h3>
                    </div>
                    <form class="form" method="post" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Photos -->
                            <div class="form-group row">
                                <!-- Pict 1 -->
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                        <input type="file" name="pict_1" accept=".png, .jpg, .jpeg"
                                            class="custom-file-input" id="customFileLang" lang="en">
                                        <input type="hidden" name="id" value="{{ old('pict_1') }}" required />
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                </div>
                                <!-- Pict 2 -->
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                        <input type="file" name="pict_2" accept=".png, .jpg, .jpeg"
                                            class="custom-file-input" id="customFileLang" lang="en">
                                        <input type="hidden" name="id" value="{{ old('pict_2') }}" />
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                </div>
                                <!-- Pict 3 -->
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                        <input type="file" name="pict_3" accept=".png, .jpg, .jpeg"
                                            class="custom-file-input" id="customFileLang" lang="en">
                                        <input type="hidden" name="id" value="{{ old('pict_3') }}" />
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label>Nama Produk</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" required
                                        placeholder="Masukkan Nama Produk" />
                                </div>
                                <div class="col-lg-3">
                                    <label>Harga</label>
                                    <input type="number" class="form-control" readonly value="0" name="price" />
                                </div>
                                <div class="col-lg-6">
                                    <label>Pilih Kategori</label>
                                    <select class="form-control" required name="categories_id">
                                        @foreach ($items as $key)
                                            <option value="{{ $key->id }}">{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                            
                                <div class="col-lg-6">
                                    <label for="exampleTextarea">Deskripsi</label>
                                    <textarea class="form-control" rows="3" name="desc" required
                                        placeholder="Masukkan Deskripsi">{{ old('desc') }} </textarea>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                    <button type="button" class="btn btn-secondary"><a
                                            href="{{ route('produk.index') }}">Kembali</a></button>
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
