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
                            <li class="breadcrumb-item"><a href="/penjualancustom">Daftar Penjualan Custom</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Tambah Penjualan Custom</li>
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
                    <h3 class="mb-0">Form Penjualan Custom</h3>
                </div>
                @foreach($data_penjualan as $DP)
                <form class="form" method="post" action="{{route('penjualancustom.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Id Order</label>
                                <input type="number" class="form-control" name="id" id="id" value="{{ $DP->id_order }}" readonly />
                            </div>
                            <div class="col-lg-6">
                                <label>Tanggal Order</label>
                                <input type="text" class="form-control" name="date" id="date" value="{{ $DP->date }}" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Size Beli</label>
                                <input type="text" class="form-control" name="size" value="{{ $DP->size }}" readonly />
                            </div>
                            <div class="col-lg-6">
                                <label>Jumlah Beli</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ $DP->qty }}" onkeyup="totalharga();" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga" onkeyup="totalharga();" />
                            </div>
                            <div class="col-lg-6">
                                <label>Data Alamat Pelanggan : </label>
                                <textarea rows="4" cols="40" class="form-control" readonly>
                                    Alamat : {{ $DP->address }},
                                    Kecamatan : {{ $DP->kecamatan }},
                                    Kelurahan = {{ $DP->kelurahan }},
                                    Kota : {{ $DP->city }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Ongkir</label>
                                <input type="number" class="form-control" name="ongkir" id="ongkir" onkeyup="totalharga();" />
                            </div>
                            <div class="col-lg-6">
                                <label>Total</label>
                                <input type="number" class="form-control" name="total" id="total" onkeyup="totalharga();" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Order</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('custom.index')}}">Cancel</a></button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            @endforeach
        </div>
        <script>
            function totalharga() {
                var jmlbeli = document.getElementById('jumlah').value;
                var harga = document.getElementById('harga').value;
                var ongkir = document.getElementById('ongkir').value;
                var result = (parseInt(jmlbeli) * parseInt(harga)) + parseInt(ongkir);
                document.getElementById('total').value = result;
            }
        </script>
    </div>
</div>
@include('admin.layouts.footer')
</div>
@endsection