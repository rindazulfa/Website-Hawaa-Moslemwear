@extends('layouts.app')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Collection</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Product</span></p>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <div class="content-justify-center text-center mb-5">
                <h5>**Jika anda ingin melihat kategori, anda wajib login</h5>
                @guest
                @else
                    <h4 class="breadcrumbs">Kategori Produk</h4>
                    @forelse($kategori as $cat)
                        {{-- <form action="{{ route('kategori.tampil', [$cat->id]) }}" method="POST">

                            <button type="submit" class="btn btn-dark">{{ $cat->name }}</button>
                        </form> --}}

                        <a href="{{ route('kategori.tampil', [$cat->id]) }}">{{ $cat->name }}</a>
                    @empty
                        <a href="#">Belum ada kategori Produk}</a>
                    @endforelse
                @endguest
            </div>
            <div class="row justify-content-center">
                <!-- <form action="" method="post"> -->
                @forelse($shop as $key)
                    <div class="col-sm col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ route('shop.show', [$key->id]) }}" class="img-prod"><img class="img-fluid"
                                    src="{{ '/uploads/products/' . $key->pict_1 }}" alt="{{ $key->name }}">
                                <!-- <span class="status">30%</span> -->
                            </a>
                            <div class="text py-3 px-3">
                                <h3><a href="#">{{ $key->name }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="price-sale">Rp
                                                {{ number_format($key->price, 2, ',', '.') }}</span></p>
                                    </div>
                                </div>
                                @guest
                                @else
                                    <hr>
                                    <!-- <p class="bottom-area d-flex">
                <a href="{{ route('store') }}" class="add-to-cart" type="submit"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
               </p> -->
                                    <form action="{{ route('shop.store') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" id="id" value="{{ $key->id }}" hidden readonly>
                                        <input type="number" name="price" id="price" value="{{ $key->price }}" hidden
                                            readonly>
                                        <input type="text" name="size" id="size" value="1" hidden readonly>
                                        <input type="number" name="qty" id="qty" value="1" hidden readonly>
                                        <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" hidden readonly>
                                        <p class="bottom-area d-flex">
                                            <button class="add-to-cart" type="submit"><span>Tambah Keranjang<i
                                                        class="ion-ios-add ml-1"></i></span></button>
                                        </p>
                                    </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Data Kosong</td>
                    </tr>
                @endforelse
            </div>
        </div>
    </section>
@endsection
