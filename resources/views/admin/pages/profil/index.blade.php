@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Profil UMKM</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            {{-- <li class="breadcrumb-item"><a href="/profilumkm">Daftar Profil UMKM</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Daftar Profil UMKM</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('profilumkm.create')}}" class="btn btn-sm btn-neutral">Tambah Profil UMKM</a>
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
                    <h3 class="mb-0">Daftar Profil UMKM</h3>
                    <!-- <p class="mb-0">Note : Profile UMKM yang ditampilkan pada website hanya yang paling atas </p> -->
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id_produk">Id</th>
                                <th scope="col" class="sort" data-sort="nama_produk">Gambar</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Telepon</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Alamat</th>
                                <th scope="col" class="sort" data-sort="stok_produk">Instagram</th>
                                <!-- <th scope="col" class="sort" data-sort="harga_produk">Deskripsi 1</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Deskripsi 2</th> -->
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($page as $item)
                            <tr>
                                <td class="id_produk">{{$item->id}}</td>
                                <td>
                                    <div class="avatar rounded-circle mr-3">
                                        <img src="{{asset('/uploads/profil/'.$item->picture)}}" alt="photo">
                                    </div>
                                </td>
                                <td >{{$item->telepon}}</td>
                                <td >{{$item->address}}</td>
                                <td >{{$item->ig}}</td>
                                <!-- <td >{{$item->desc_1}}</td>
                                <td >{{$item->desc_2}}</td> -->
                                <td>
                                    <a href="{{route('profilumkm.show',[$item->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Detail
                                    </a>
                                    <!-- <button type="button" class="btn btn-outline-primary">Update</button> -->
                                    <button class="btn btn-outline-danger delete" data-id="{{$item->id}}">Hapus</button>
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
                        url: "{{url('/profilumkm/')}}/" + id,
                        method: "DELETE",
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                text: 'data has been deleted!'
                            })
                            setTimeout(function() {
                                window.location.href = "{{route('profilumkm.index')}}"
                            }, 1500);
                        }
                    });
                }
            });
        })
    })
</script>
@endpush