@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pembelian</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/pembelian">Data Transaksi Pembelian</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Data Transaksi Pembelian</li>
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
                    <h3 class="mb-0">Form Pembelian</h3>
                </div>
                @foreach($data_pembelian as $DP)
                <form class="form" method="post" action="{{route('pembelian.update', [$DP->id])}}" enctype="multipart/form-data">
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
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="date" value="<?php echo date('y-m-d'); ?>"/>
                            </div>
                            <div class="col-lg-6">
                                <label>Nama Bahan</label>
                                <select class="form-control" name="cbnamabahan" id="cbnamabahan" readonly>
                                    <option value="">Pilih Bahan</option>
                                    @foreach($data_materials as $DM)
                                    @if($DM->id == $DP->materials_id)
                                    <option value="{{ $DM->id }}" data-harga="{{ $DM->price }}" selected>{{ $DM->name }}</option>
                                    @else
                                    <option value="{{ $DM->id }}" data-harga="{{ $DM->price }}">{{ $DM->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Harga Bahan</label>
                                <input type="number" class="form-control" name="harga" id="harga" value="{{ $DP->harga }}" onkeyup="totalharga();" readonly />
                            </div>
                            <div class="col-lg-6">
                                <label>QTY Beli</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ $DP->qty }}" onkeyup="totalharga();" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Total Beli</label>
                                <input type="text" class="form-control" name="total" id="total" onkeyup="totalharga();" value="{{ $DP->total }}" readonly />
                            </div>
                            <div class="col-lg-6">
                                <label>Nama Supplier</label>
                                <input type="text" class="form-control" name="namasup" id="namasup" value="{{ $data_suppliers[0]->name }}" readonly />
                                <!-- <select class="form-control" name="cbnamasup" id="cbnamasup">
                                    <option value="">Pilih Supplier</option>
                                    @foreach($data_suppliers as $DS)
                                    @if($DS->id == $DP->suppliers_id)
                                    <option value="{{ $DP->id }}" selected>{{ $DS->name }}</option>
                                    @else
                                    <option value="{{ $DP->id }}">{{ $DS->name }}</option>
                                    @endif
                                    @endforeach
                                </select> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Keterangan Beli</label>
                                <input type="text" class="form-control" name="keterangan" value="{{ $DP->keterangan }}" />
                            </div>
                            <div class="col-lg-6">
                                <label>Satuan Beli</label>
                                <input type="text" class="form-control" name="satuan" value="{{ $DP->satuan }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('pembelian.index')}}">Cancel</a></button>
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
                    var result = parseInt(jmlbeli) * parseInt(harga);
                    document.getElementById('total').value = result;
                }
            </script>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection