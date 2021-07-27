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
                            <li class="breadcrumb-item"><a href="/supplier">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Supplier</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('supplier.create')}}" class="btn btn-sm btn-neutral">Tambah Supplier</a>
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
                    <h3 class="mb-0">Daftar Supplier</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id">Id</th>
                                <th scope="col" class="sort" data-sort="name">Nama</th>
                                <th scope="col" class="sort" data-sort="address">Alamat</th>
                                <th scope="col" class="sort" data-sort="email">Email</th>
                                <th scope="col" class="sort" data-sort="phone">Telepon</th>
                                <!-- <th scope="col" class="sort" data-sort="material_name">Material</th> -->
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        @forelse ($page as $item)
                            <tr>
                                <td >{{$item->id}}</td>
                                <td >{{$item->name}}</td>
                                <td >{{$item->address}}</td>
                                <td >{{$item->email}}</td>
                                <td >{{$item->phone}}</td>
                                <!-- <td >{{$item->material->name ?? ''}}</td> -->
                                <td>
                                    <a href="{{route('supplier.edit',[$item->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Update
                                    </a>
                                    
                                    <!-- <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" title="Delete">Delete</button>
                                -->
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('supplier.destroy', [$item -> id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-content">
                                            <div class="modal-header py-5">
                                                <h3 class="modal-title" id="exampleModalLabel"> Hapus Supplier</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>
                                                    Yakin menghapus data {{ $item -> name}} ?
                                                </h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger font-weight-bold text-uppercase">Submit</button>
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
                <!-- Card footer -->
              
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection