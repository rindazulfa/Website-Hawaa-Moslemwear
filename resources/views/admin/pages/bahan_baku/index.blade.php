@extends('admin.layouts.app')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Bahan Baku</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                                {{-- <li class="breadcrumb-item"><a href="/bahan_baku">Tables</a></li> --}}
                                <li class="breadcrumb-item active" aria-current="page">Daftar Bahan Baku</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('bahan_baku.create') }}" class="btn btn-sm btn-neutral">Tambah Bahan Baku</a>
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
                        <h3 class="mb-0">Daftar Bahan Baku</h3> <span>(untuk kain saja)</span>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="no">ID </th>
                                    <th scope="col" class="sort" data-sort="nama_produk">Nama Bahan</th>
                                    <th scope="col" class="sort" data-sort="harga_produk">Harga Per Meter</th>
                                    <th scope="col" class="sort" data-sort="stok_produk">Stok</th>
                                    {{-- <th>Satuan</th> --}}
                                    <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($items as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->name }}</td>
                                        <td> Rp {{ number_format($key->price, 2, ',', '.') }}</td>
                                        <td>{{ $key->qty }} Meter</td>
                                        {{-- <td>{{$key->satuan}}</td> --}}
                                        <td>
                                            <a href="{{ route('bahan_baku.edit', [$key->id]) }}"
                                                class="btn btn-outline-primary" title="Edit">
                                                Ubah
                                                <!-- </a>
                                        <button class="btn btn-outline-danger delete" value="{{ $key->id }}" data-toggle="modal" data-target="#exampleModal-{{ $key->id }}" title="Delete">Delete</button> -->
                                        </td>
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
