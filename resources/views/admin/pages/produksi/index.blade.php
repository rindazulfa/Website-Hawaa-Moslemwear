@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Produksi</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Produksi</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('produksi.create')}}" class="btn btn-sm btn-neutral">Tambah Produksi</a>
                </div> -->
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
                    <h3 class="mb-0">Daftar Produksi</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="no">ID</th>
                                <th>Nama Produk</th>
                                <th>Ukuran Produk</th>
                                <th>Tanggal Produksi</th>
                                <th>Jumlah Produksi</th>
                                <th>Tanggal Jadi</th>
                                <!-- <th scope="col" class="sort" data-sort="aksi">Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($page as $key)
                            <tr>
                                <td>{{$key->id}}</td>
                                <td>{{$key->name}}</td>
                                <td>{{$key->recipes_id}}</td>
                                <td>{{$key->date}}</td>
                                <td>{{$key->qty}}</td>
                                <td>{{$key->date}}</td>
                                <!-- <td>
                                    <a href="{{route('produksi.edit',[$key->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Update
                                    </a>
                                </td> -->
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
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection