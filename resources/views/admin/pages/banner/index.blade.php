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
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Banner</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('banner.create')}}" class="btn btn-sm btn-neutral">Tambah Banner</a>
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
                    <h3 class="mb-0">Daftar Banner</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="no">Pict</th>
                                <th scope="col" class="sort" data-sort="no">Judul</th>
                                <th scope="col" class="sort" data-sort="no">SubJudul</th>
                                <th scope="col" class="sort" data-sort="no">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($page as $item)
                            <tr>
                                <td>
                                    <div class="avatar rounded-circle mr-3">
                                        <img src="{{asset('/uploads/banner/'.$item->picture)}}" alt="photo">
                                    </div>
                                </td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->subtitle}}</td>
                                <td>
                                    <a href="{{route('banner.edit',[$item->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Update
                                    </a>
                                    <!-- <button type="button" class="btn btn-outline-primary">Update</button> -->
                                    <button class="btn btn-outline-danger delete" data-id="{{$item->id}}">Delete</button>
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
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
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
                text: "Are you sure to delete this banner.",
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
                        url: "{{url('/banner/')}}/" + id,
                        method: "DELETE",
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                text: 'banner has been deleted!'
                            })
                            setTimeout(function() {
                                window.location.href = "{{route('banner.index')}}"
                            }, 1500);
                        }
                    });
                }
            });
        })
    })
</script>
@endpush