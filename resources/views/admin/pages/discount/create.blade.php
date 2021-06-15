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
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/discount">Data Diskon</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Data Diskon</li>
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
                    <h3 class="mb-0">Form Banner</h3>
                </div>
                <form class="form" method="post" id="formDiskon"  action="{{route('discount.store')}}" enctype="multipart/form-data">
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
                            <div class="col-lg-6 mt-4">
                                <label>Nama Discount</label>
                                <input type="text" class="form-control" required value="{{ old('name_disc') }}"
                                    name="name_disc" placeholder="Masukkan Nama Discount" />
                            </div>
                            <div class="col-lg-6 mt-4">
                                <label>Discount</label>
                                <input type="number" min="1" class="form-control" required value="{{ old('discount') }}"
                                    name="discount" id="discount" placeholder="Masukkan Jumlah Diskon" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mt-4">
                                <select class="form-control" required id="status" name="status" id="status">
                                    <option value='0'>Choose Status</option>
                                    <option value="presentase">Presentase</option>
                                    <option value="ribuan">Ribuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('banner.index')}}">Cancel</a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection

@push('custom-script')
<script>
    $(document).ready(function () {
        $(document).on("submit","#formDiskon",function () {
            var status = $('#status').find(':selected').val();
            var discount = $('#discount').val();
            if(status==0){
                Swal.fire({
                    icon: 'info',
                    title: 'Oops...',
                    text: 'Please choose status!'
                    })
                return false;
            }else if(status == "presentase" && discount > 100){
                Swal.fire({
                    icon: 'info',
                    title: 'Oops...',
                    text: 'Max discount is 100 for status presentase!'
                    })
                return false;
            }else if(status == "presentase" && discount == 0){
                Swal.fire({
                    icon: 'info',
                    title: 'Oops...',
                    text: 'Discount cant be 0 for status presentase!'
                    })
                return false;
            }else if(status == "ribuan" && discount == 0){
                Swal.fire({
                    icon: 'info',
                    title: 'Oops...',
                    text: 'Discount cant be 0 for status ribuan!'
                    })
                return false;
            }
         })
     })
</script>
@endpush
