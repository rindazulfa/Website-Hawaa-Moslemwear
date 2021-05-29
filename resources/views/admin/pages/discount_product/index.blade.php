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
                            <li class="breadcrumb-item active" aria-current="page">Daftar Discount</li>
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
                    <h3 class="mb-0">Daftar Discount</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Discount Name</th>
                                <th>Amount of discount</th>
                                <th>Percentage Discount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse($data as $key)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$key->name}}</td>
                                <td>{{$key->price}}</td>
                                <td>{{$key->name_disc}}</td>
                                @if ($key->status == "presentase")
                                <td>{{($key->discount/100)*$key->price}}</td>
                                <td>{{$key->discount}} %</td>
                                @else
                                <td>{{$key->discount}}</td>
                                <td>{{($key->discount*100)/ $key->price}} %</td>
                                @endif
                                <td>
                                    <a href="{{route('discount.edit',[$key->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Update
                                    </a>
                                    <!-- <button type="button" class="btn btn-outline-primary">Update</button> -->
                                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" title="Delete">Delete</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('discount_product.destroy', [$key -> id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-content">
                                            <div class="modal-header py-5">
                                                <h5 class="modal-title" id="exampleModalLabel"> Hapus Customer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>
                                                    Yakin menghapus data {{ $key -> name_disc}}
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger font-weight-bold text-uppercase">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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