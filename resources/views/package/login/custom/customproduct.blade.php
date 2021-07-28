@extends('layouts.app')
@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 ftco-animate">
        <form action="{{route('custom.store')}}" method="post" enctype="multipart/form-data" class="billing-form bg-light p-3 p-md-5">
          @csrf
          <h3 class="mb-4 billing-heading">Form Custom Product</h3>
          <div class="row align-items-end">
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Tanggal Pembelian</label>
                <input type="text" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="file">File Desain</label>
                <input type="file" class="form-control" placeholder="Masukkan file Anda" name="file" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="keterangan">Keterangan Desain</label>
                <input type="text" class="form-control" placeholder="Tambahkan Keterangan Desain" name="keterangan" required>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <label for="">Catatan : <p>Hanya dapat mengupload 1 file desain,
                  diharapkan 1 file desain mengandung seluruh tampilan desain terkait.
                </p></label>
            </div>
          </div>
          <div class="container col-md-4">
            <input type="submit" value="Ajukan Desain" class="btn btn-primary py-3 px-5">
          </div>
        </form>
        <!-- END -->
      </div>
      <!-- .col-md-8 -->
    </div>
  </div>
</section>
@endsection