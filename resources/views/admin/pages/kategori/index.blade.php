@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Kategori</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            {{-- <li class="breadcrumb-item"><a href="/kategori">Kategori</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Daftar Kategori</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('kategori.create')}}" class="btn btn-sm btn-neutral">Tambah Kategori</a>
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
                    <h3 class="mb-0">Daftar Kategori</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id">ID </th>
                                <th scope="col" class="sort" data-sort="nama">Nama Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($page as $key)
                            <tr>
                                <td>{{$key->id}}</td>
                                <td>{{$key->name}}</td>
                                <td>
                                    <a href="{{route('kategori.edit',[$key->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Ubah
                                    </a>
                                    <button class="btn btn-outline-danger delete" value="{{ $key->id }}" data-toggle="modal" data-target="#exampleModal-{{$key->id}}" title="Delete">Hapus</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal-{{$key->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('kategori.destroy', [$key->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-content">
                                            <div class="modal-header py-5">
                                                <h2 class="modal-title" id="exampleModalLabel"> Hapus kategori</h2>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>
                                                    Yakin menghapus data {{ $key->name }} ?
                                                </h3>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger font-weight-bold text-uppercase">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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