@extends('admin.layouts.app')
@section('content')
<!-- <script type="text/javascript">
    window.onload = function() {
        $("#cbnamabahan").change(function() {
            var ambilharga = $("#data_materials-" + this.value).data('harga');
            $("#harga").val(ambilharga);
        });
    }
</script> -->
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
                <form class="form" method="post" action="{{route('pembelian.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" required name="date" value="<?php echo date('y-m-d'); ?>"/>
                            </div>
                            <div class="col-lg-6">
                                <label>Nama Bahan (Termasuk Warna)</label>
                                <select class="form-control" required name="cbnamabahan" id="cbnamabahan">
                                    <option value="" selected>Pilih Bahan</option>
                                    @foreach($data_materials as $DM)
                                    <option value="{{ $DM->id }}" data-harga="{{ $DM->price }}">{{ $DM->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Harga Bahan</label>
                                <input type="number" required class="form-control" name="harga" id="harga" onkeyup="totalharga();" />
                            </div>
                            <div class="col-lg-6">
                                <label>Jumlah Beli (M<sup>2</sup>)</label>
                                <input type="number" required class="form-control" name="jumlah" id="jumlah" onkeyup="totalharga();" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Total Harga Beli</label>
                                <input type="text" required class="form-control" name="total" id="total" onkeyup="totalharga();" readonly />
                            </div>
                            <div class="col-lg-6">
                                <label>Nama Supplier</label>
                                <select class="form-control" required name="cbnamasup" id="cbnamasup">
                                    <option value="" selected>Pilih Supplier</option>
                                    @foreach($data_supplier as $DS)
                                    <option value="{{ $DS->id }}">{{ $DS->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Keterangan Beli</label>
                                <input type="text" class="form-control" name="keterangan" />
                            </div>
                            <!-- <div class="col-lg-6">
                                <label>Warna</label>
                                <input type="text" required class="form-control" name="satuan"/>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('pembelian.index')}}">Cancel</a></button>
                            </div>
                        </div>
                    </div>
                </form>
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