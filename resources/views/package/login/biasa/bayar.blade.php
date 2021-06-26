@extends('layouts.app')
@section('content')
<section class="ftco-section">
  <div class="text-center">
    <p>Pastikan Anda memasukkan jumlah pembayaran dan nomor rekening yang tertera dengan benar</p>
  </div>
  <div class="container">
    <div class="row pt-3 d-flex">
      <div class="col-md-6 d-flex">
        <div class="cart-detail cart-total bg-light p-3 p-md-4">
          @forelse($data as $dt)
          <h5 hidden>Id Order : {{ $data[0]->id }}</h5>
          @empty
          <h4>Id Order : Kosong</h4>
          @endforelse
          <h3 class="billing-heading mb-4">Daftar Rekening Transfer</h3>
          <p>Jumlah yang harus anda bayar : Rp. <strong>{{number_format($total[0]->total,2,',','.')}}</strong> </p>
          <hr>
          @forelse($payment as $key)
          <p class="d-flex">
            <span>Bank <strong>{{ $key->bank }}</strong> :</span>
            <span><strong>{{ $key->no_rekening }}</strong></span>
            <span>A/n : <strong>{{ $key->name}}</strong></span>
          </p>
          <hr>
          @empty
          <p class="d-flex">
            <span>Bank <strong>Tidak tersedia</strong> :</span>
          </p>
          <hr>
          @endforelse
          <p>Berikut merupakan contoh screenshoot bukti pembayaran</p>
          <div class="row">
            <div class="col-sm text-center">
              <p><strong>Bukti Valid</strong></p>
              <img src="{{ asset('uploads/bukti/contohbukti.jpg') }}" alt="gbrcthbukti" width="230px" height="400px">
            </div>
            <div class="col-sm text-center">
              <p><strong>Bukti Tidak valid</strong></p>
              <img src="{{ asset('uploads/bukti/contohbuktinon.jpeg') }}" alt="gbrcthbuktinon" width="230px" height="400px">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        @forelse($data as $dt)
        <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data" class="billing-form bg-light p-3 p-md-5" >
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @csrf
          <h3 class="mb-4 billing-heading">Form Custom Product <br>Data Pembayaran</h3>
          <div class="row align-items-end">
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
              <input type="number" class="form-control" name="id" value="{{ $dt->id }}" readonly hidden>
                <label for="purpose">Tujuan Pembayaran</label>
                <select class="form-control" name="cbnamabank" id="cbnamabank">
                  <option value="" selected>Pilih Bank Tujuan</option>
                  @foreach($payment as $pay)
                  <option value="{{ $pay->bank }}">{{ $pay->bank }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="date">Tanggal Pembayaran</label>
                <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
              </div>
              <div class="form-group">
                <label for="amount">Jumlah Transfer</label>
                <input type="number" class="form-control" placeholder="Masukkan Jumlah Pembayaran" name="amount">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="file">Bukti Pembayaran</label>
                <input type="file" class="form-control" placeholder="Masukkan bukti pembayaran Anda" name="file">
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Keterangan</label>
                <input type="text" class="form-control" placeholder="Masukkan Keterangan Anda" name="description">
              </div>
            </div>
          </div>
          <div class="container col-md-4">
            <input type="submit" value="Lanjutkan" class="btn btn-primary py-3 px-5">
          </div>
        </form>
        @empty
        <p class="d-flex">
          Kosong
        </p>
        <hr>
        @endforelse
      </div>
    </div>
  </div>
  <!-- <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 ftco-animate">
        Letak Sebelumnya
      </div>
    </div>
  </div> -->
</section>
@endsection