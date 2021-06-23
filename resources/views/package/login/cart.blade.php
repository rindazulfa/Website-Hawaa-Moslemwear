@extends('layouts.app')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">My Cart</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span><span>Cart</span></p>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cek as $key)
                            <form action="">
                                <tr class="text-center">
                                    <td class="product-remove"><a href="{{ route('cart.destroy', [$key->id]) }}"><span class="ion-ios-close"></span></a></td>
                                    <td class="image-prod">
                                        <div class="img" style="background-image: url({{'uploads/products/'.$key->pict_1}});"></div>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $key->name }}</h3>
                                    </td>
                                    <td class="size">
                                        <div class="input-group mb-3">
                                            <input type="text" name="size" class="quantity form-control input-number" value="{{ $key->size }}" min="1" max="3">
                                        </div>
                                    </td>
                                    <td class="price" id="price">Rp. {{number_format($key->price,2,',','.')}}</td>
                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="number" name="qty" id="qty" class="quantity form-control input-number" value="{{ $key->qty }}" min="1" max="100">
                                        </div>
                                    </td>
                                    <td class="subtotal">
                                        <div class="input-group mb-3">
                                            <input type="text" name="subtotal" class="quantity form-control input-number" value="Rp. {{number_format($key->subtotal,2,',','.')}}" readonly>
                                        </div>
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
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Option Cart</h3>
                    <!-- <p class="d-flex">
                        <span>Delivery</span>
                        <span>Rp0.00</span>
                    </p> -->
                    <hr>
                    <p class="text-center">
                        <a href="/shop" class="btn btn-primary py-3 px-4">Tambah</a>
                    </p>
                    <p class="text-center">
                        <button type="submit" class="btn btn-primary py-3 px-4">
                            Ubah
                        </button>
                    </p>
                </div>
            </div>
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>Rp. {{number_format($total,2,',','.')}}</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>Rp0.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>Rp. {{number_format($total,2,',','.')}}</span>
                    </p>
                </div>
                <p class="text-center">
                    <button type="submit" class="btn btn-primary py-3 px-4">
                        Proceed to Checkout
                    </button>
                </p>
            </div>
        </div>
        </form>
        <!-- <script>
            function totalharga() {
                var jmlbeli = document.getElementById('qty').value;
                var harga = document.getElementById('price').value;
                var result = parseInt(jmlbeli) * parseInt(harga);
                document.getElementById('total').value = result;
            }
        </script> -->
    </div>
</section>

@endsection