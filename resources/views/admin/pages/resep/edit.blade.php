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
                            <li class="breadcrumb-item"><a href="/bahan_baku">Data Resep</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Resep</li>
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
                    <h3 class="mb-0">Form Resep Produk</h3>
                </div>
                <form class="form" method="post" action="{{route('resep.update',[$detail->id])}}">
                @method('PUT')    
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
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="no">ID</th>
                                        <th>Nama Bahan</th>
                                        <th>QTY</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @forelse($bahan as $key)
                                    <tr>
                                        <td><input type="checkbox" name="materials_id[]" value="{{$key->id}}"></td>
                                        <td>{{$key->name}}</td>
                                        <td><input type="number" class="form-control" name="qty[]"></td>
                                        <td><input type="text" class="form-control" name="satuan[]"></td>
                                    </tr>

                                    @empty

                                    <tr>
                                        <td colspan="7" class="text-center">Data Kosong</td>
                                    </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">a
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
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