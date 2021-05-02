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
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Data Promo</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Data Promo</li>
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
                    <h3 class="mb-0">Form Promo</h3>
                </div>
                <!-- <form class="form" method="post" action="{{route('product.store')}}" enctype="multipart/form-data"> -->
                <form class="form" method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>Nama Promo</label>
                                <input type="text" class="form-control" value="" name="name" placeholder="Masukkan Nama Promo" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>Potongan Harga</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbjenis" id="rbpersen" onclick="jenispromo();">
                                    <label class="form-check-label" for="rbpersen">Persen</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rbjenis" id="rbnominal" onclick="jenispromo();">
                                    <label class="form-check-label" for="rbnominal">Nominal</label>
                                </div><br>
                                <div id="nominal" style="display: none;">
                                    <input type="number" class="form-control" value="" name="price" placeholder="Masukkan Jumlah Potongan Harga (Rp.)" data-rule="maxlen:6" data-msg="Yakin mau kasih diskon diatas 6 digit ?"/>
                                </div>
                                <div id="persen" style="display: none;">
                                    <input type="number" class="form-control" value="" name="price" placeholder="Masukkan Jumlah Potongan Harga (%)" data-rule="maxlen:2" data-msg="Ingat besar promo dalam bentuk persen"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>Masa Aktif Promo</label>
                                <!-- Date Picker -->
                                <!-- <input type="text" class="form-control" value="" name="name" placeholder="Masukkan Nama Promo" /> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <button type="button" class="btn btn-secondary"><a href="#">Cancel</a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                function jenispromo() {
                    if (document.getElementById('rbpersen').checked) {
                        document.getElementById('persen').style.display = 'block';
                        document.getElementById('nominal').style.display = 'none';
                    } else {
                        document.getElementById('persen').style.display = 'none';
                        document.getElementById('nominal').style.display = 'block';
                    }
                }
            </script>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection