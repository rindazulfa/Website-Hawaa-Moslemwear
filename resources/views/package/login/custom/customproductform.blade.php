@extends('layouts.app')
@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 ftco-animate">
        <form action="{{route('custom.update', [$items->id])}}" method="post" class="billing-form bg-light p-3 p-md-5">
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @method('PUT')
          @csrf
          <h3 class="mb-4 billing-heading">Form Custom Product <br>Data Order</h3>
          <div class="row align-items-end">
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="size">Ukuran Order</label>
                <input type="text" class="form-control" placeholder="Masukkan Ukuran yang Anda Pesan" name="size" required>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="qty">Jumlah Pesanan</label>
                <input type="number" class="form-control" placeholder="Masukkan Jumlah Pesanan Anda" name="qty" required>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" placeholder="Menunggu Admin" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="satuan">Warna</label>
                <input type="text" class="form-control" placeholder="Warna yang Anda Pesan" name="warna" required>
              </div>
              <div class="form-group">
                <label for="shipping">Shipping</label>
                <!-- <input type="text" class="form-control" placeholder="Masukkan jenis shipping yang Anda Pesan" name="shipping"> -->
                <select class="form-control" name="cbnamashipping" id="cbnamashipping" required>
                  <option value="" selected>Pilih Jenis Pengiriman</option>
                  @foreach($ship as $sp)
                  <option value="{{ $sp->nama }}">{{ $sp->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" placeholder="Masukkan Keterangan Anda" name="keterangan" required>
              </div>
            </div>
          </div>
          <div class="container col-md-4">
            <input type="submit" value="Lanjutkan" class="btn btn-primary py-3 px-5">
          </div>
        </form>
        <!-- END -->
      </div>
      <!-- .col-md-8 -->
    </div>
  </div>
</section>
@endsection