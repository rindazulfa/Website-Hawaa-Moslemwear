@extends('layouts.app')
@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 ftco-animate">
        <form action="{{ route('customer.store') }}" method="POST" class="billing-form bg-light p-3 p-md-5">
          @csrf
          <h3 class="mb-4 billing-heading">Form Data Customer </h3>
          <div class="row align-items-end">
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="alamat">Alamat Rumah</label>
                <input type="text" class="form-control" placeholder="Masukkan Alamat Rumah Anda" name="address" required>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" placeholder="Masukkan Kota Anda" name="city" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control" name="province" placeholder="Masukkan Provinsi Anda" name="provinsi" required>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <input type="text" class="form-control" required placeholder="Masukkan Kelurahan Anda" name="kelurahan">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" required placeholder="Masukkan Kecamatan Anda" name="kecamatan">
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_pos">Kode Pos</label>
                <input type="number" class="form-control" name="postal" placeholder="Masukkan Kode Pos Anda" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_telp">Nomor Telepon</label>
                <input type="text" class="form-control" name="phone" placeholder="Masukkan Nomor Telepon Anda" required>
              </div>
            </div>
          </div>
          <div class="container col-md-4">
            <input type="submit" value="Simpan Data" class="btn btn-primary py-3 px-5">
          </div>
        </form>
        <!-- END -->
      </div>
      <!-- .col-md-8 -->
    </div>
  </div>
</section>
<!-- <div class="container">
  <div class="row no-gutters slider-text align-items-center justify-content-center">
    <div class="col-md-9 ftco-animate text-center">
      <h1 class="mb-0 bread">Custom Product</h1>
      <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Contact</span></p>
    </div>
  </div>
</div> -->
@endsection