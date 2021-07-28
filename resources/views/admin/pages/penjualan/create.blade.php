@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pembelian</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/penjualan">Daftar Transaksi Penjualan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Data Transaksi Penjualan</li>
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
                    <h3 class="mb-0">Form Penjualan</h3>
                </div>
                <form class="form" method="post" action="{{ route('cart.update',[$id]) }}">
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
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Id Order : {{ $id }}</label>
                                </div>
                                <div class="col-lg-6">
                                    <label>Tanggal Order : <strong>{{ $produk[0]->date }}</strong></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Nama Customer : <strong>{{ $pelanggan[0]->first_name }}</strong></label>
                                </div>
                                <div class="col-lg-6">
                                    <label>Alamat Pengiriman : <strong>{{ $pelanggan[0]->address }} , {{ $pelanggan[0]->city }}</strong></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Harga : </label>
                                    <input type="number" class="form-control" name="harga" id="harga" value="{{ $produk[0]->total }}" onkeyup="totalharga();" readonly>
                                </div>
                                <div class="col-lg-6">
                                    <label>Ongkir : </label>
                                    <input type="number" class="form-control" name="ongkir" id="ongkir" onkeyup="totalharga();" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Total Harga : </label>
                                    <input type="number" class="form-control" name="total" id="total" onkeyup="totalharga();" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Status Pembayaran :
                                        <strong>
                                            <?php
                                            if ($produk[0]->status == 'Selesai') {
                                                ?>
                                                Telah dibayar
                                            <?php
                                            } else {
                                                ?>
                                                Belum dibayar
                                            <?php
                                            }
                                            ?>
                                        </strong></label>
                                </div>
                                <div class="col-lg-6">
                                    <label>Jenis Pengiriman : <strong>{{ $produk[0]->shipping }}</strong></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="">Nama Produk</th>
                                            <th scope="col" class="sort" data-sort="">Size Produk</th>
                                            <th scope="col" class="sort" data-sort="">Jumlah Order</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @forelse($produk as $key)
                                        <tr>
                                            <td>{{ $key->name }}</td>
                                            <td>{{ $key->size }}</td>
                                            <td>{{ $key->qty }}</td>
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
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary">Order</button>
                                    <button type="button" class="btn btn-secondary"><a href="{{route('penjualan.index')}}">Kembali</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                function totalharga() {
                    // var jmlbeli = document.getElementById('jumlah').value;
                    var harga = document.getElementById('harga').value;
                    var ongkir = document.getElementById('ongkir').value;
                    var result = parseInt(harga) + parseInt(ongkir);
                    document.getElementById('total').value = result;
                }
            </script>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection