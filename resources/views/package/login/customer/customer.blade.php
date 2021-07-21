@extends('layouts.app')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 ftco-animate">
                <form action="{{ route('customer.update',[$items[0]->id]) }}" method="POST" class="billing-form bg-light p-3 p-md-5">
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
                        <h3 class="mb-4 billing-heading">Data Anda</h3>
                        <div class="row align-items-end">
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat Rumah</label>
                                    <input type="text" class="form-control" name="address" value="{{ $items[0]->address }}">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" class="form-control" name="city" value="{{ $items[0]->city }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" class="form-control" name="province" name="provinsi" value="{{ $items[0]->province }}">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="number" class="form-control" name="postal" value="{{ $items[0]->postal_code }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $items[0]->phone }}">
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
@endsection