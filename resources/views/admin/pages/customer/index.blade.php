@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Customer</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Customer</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <!-- <a href="/admin/datacustomer/formcustomer" class="btn btn-sm btn-neutral">Tambah Customer</a> -->
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
                    <h3 class="mb-0">Daftar Customer</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id_produk">Id</th>
                                <th scope="col" class="sort" data-sort="nama_produk">Nama Lengkap</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Email</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Kota</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Provinsi</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Alamat</th>
                                <th scope="col" class="sort" data-sort="stok_produk">Kode POS</th>
                                <th scope="col" class="sort" data-sort="stok_produk">No Telepon</th>
                                <th scope="col" class="sort" data-sort="stok_produk">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        @forelse($items as $key)
                            <tr>
                                <td class="id_produk">{{$key->id}}</td>
                                <td class="nama_produk">{{$key->first_name}} {{$key->last_name}}</td>
                                <td class="harga_produk">{{$key->email}}</td>
                                <td class="stok_produk">{{$key->city}}</td>
                                <td class="stok_produk">{{$key->province}}</td>
                                <td class="stok_produk">{{$key->address}}</td>
                                <td class="stok_produk">{{$key->postal_code}}</td>
                                <td class="stok_produk">{{$key->phone}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary">
                                        <a href="{{ route('customer.show',[$key->id]) }}">Detail</a>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection

@push('custom-script')
<script>
    $(document).ready(function() {
        function ajax() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        $('.delete').on('click', function() {
            var id = $(this).data('id');
            Swal.fire({
                text: "Are you sure to delete this data.",
                icon: "info",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-primary",
                    cancelButton: "btn font-weight-bold btn-default"
                }
            }).then(function(result) {
                if (result.value) {
                    ajax();
                    $.ajax({
                        url: "{{url('/custdelete/')}}/" + id,
                        method: "GET",
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                text: 'data has been deleted!'
                            })
                            setTimeout(function() {
                                window.location.href = "{{route('customer.index')}}"
                            }, 1500);
                        }
                    });
                }
            });
        })
    })
</script>
@endpush