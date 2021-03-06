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
                            <li class="breadcrumb-item"><a href="/pembelian">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Transaksi Pembelian</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-lg-6"> -->
                <div class="col-lg-6 col-1 text-right">
                    <a href="{{route('pembelian.create')}}" class="btn btn-sm btn-neutral">Tambah Pembelian</a>
                </div>
                <div class="col-lg-6 col-1 text-left">
                    <form action="{{route('pembelian.pdf')}}" method="post">
                        @csrf
                        <input type="date" name="tglawal">
                        <input type="date" name="tglakhir">
                        <button type="submit" class="btn btn-sm btn-neutral">Cetak PDF</button>
                        <!-- <a href="" class="btn btn-sm btn-neutral">Cetak PDF</a> -->
                    </form>
                </div>
                <!-- </div> -->
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
                    <h3 class="mb-0">Daftar Transaksi Pembelian</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id_transaksi_pembelian">ID</th>
                                <th scope="col" class="sort" data-sort="nama_supplier">Nama Supplier</th>
                                <th scope="col" class="sort" data-sort="nama_bahan_baku">Nama Bahan Baku</th>
                                <th scope="col" class="sort" data-sort="jumlah_beli">Jumlah Beli</th>
                                <th scope="col" class="sort" data-sort="harga_bahan">Harga Bahan</th>
                                <th scope="col" class="sort" data-sort="total_harga">Total Harga</th>
                                <th scope="col" class="sort" data-sort="tanggal_transaksi">Tanggal Transaksi</th>
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($pembelian as $key)
                            <tr>
                                <td>{{$key->id}}</td>
                                <td>{{$key->nama_sup}}</td>
                                <td>{{$key->nama_bahan}}</td>
                                <td>{{$key->qty}} {{ $key->satuan }}</td>
                                <td>Rp. {{number_format($key->harga,2,',','.')}}</td>
                                <td>Rp. {{number_format($key->total,2,',','.')}}</td>
                                <td>{{$key->date}}</td>
                                <td>
                                    <a href="{{route('pembelian.edit',[$key->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Update
                                    </a>
                                    <!-- <button class="btn btn-outline-danger delete" value="{{ $key->id }}" data-toggle="modal" data-target="#exampleModal-{{$key->id}}" title="Delete">Delete</button> -->
                                </td>
                            </tr>
                            <!-- <div class="modal fade" id="exampleModal-{{$key->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('pembelian.destroy', [$key->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-content">
                                            <div class="modal-header py-5">
                                                <h2 class="modal-title" id="exampleModalLabel"> Hapus Bahan Baku</h2>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>
                                                    Yakin menghapus data {{ $key->id}} ?
                                                </h3>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger font-weight-bold text-uppercase">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
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