@extends('layouts.app')
@section('content')
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Shoping Cart
        </span>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-10">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-0 m-r-0 m-lr-0-xl p-lr-15-sm">
                    <table>
                        <tr class="table_head">
                            <th class="column-1">Check Delivery Estimate</th>
                        </tr>
                        <tr>
                            <td>Province</td>
                            <td class="column-1">
                                <div class="m-b-10 m-t-10">
                                    {{-- <input class="stext-111 cl8 plh3 size-150 p-lr-15" type="text" name="voucher"
                                            placeholder="Province"> --}}
                                    <select class="form-control" id="province" name="province_get">
                                        <option value='0'>Choose Province</option>
                                        @foreach ($province as $item)
                                        <option value="{{$item["province_id"]}}">{{$item["province"]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr id="dropdown-city">
                            <td>City</td>
                            <td class="column-1">
                                <div class="bor8 bg0">
                                    <select class="form-control" id="city_get" name="city_get">

                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr id="dropdown-shipping">
                            <td>Choose Ship</td>
                            <td class="column-1">
                                <div class="m-b-10 m-t-10">
                                    <select class="form-control" id="ongkir" name="ongkir_get">
                                        <option value='0'>Choose Shipping</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr id="load-data">
                            <td></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <strong>Loading...</strong>
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-10">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-40 m-r-78 m-lr-0-xl p-lr-15-sm">
                    <table>
                        <tr class="table_head">
                            <th class="column-1">Voucher</th>
                        </tr>
                    </table>
                    <div class="flex-w flex-m m-r-20 m-tb-5">
                        <form action="{{route("check.voucher")}}" method="POST" id="formCheck">
                            @csrf
                            @if ($message = Session::get('info'))
                            <div class="alert alert-info alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <div class="bor8 bg0">
                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="voucher"
                                    placeholder="Voucher Code">
                            </div>
                            <button type="submit"
                                class="flex-c-m  stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-t-5">
                                Apply Voucher
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Shoping Cart -->
<form class="bg0 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Size</th>
                                <th class="column-6">Total</th>
                            </tr>
                            @csrf
                            @php
                            $total = 0;
                            $res = 0;
                            @endphp
                            @if(request()->session()->has("cart_shop_data"))
                            @forelse (request()->session()->get("cart_shop_data") as $item)
                            @php
                            $gettotal = $item["qty"] * $item["price"];
                            $total = $total+ $gettotal;
                            @endphp
                            <tr class="table_row">
                                <input type="hidden" name="products_id[]" value="{{$item["products_id"]}}"
                                    id="products_id_tabel">
                                <input type="hidden" name="size[]" value="{{$item["size"]}}" id="size_tabel">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{asset('/uploads/products/'.$item["picture"])}}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">{{$item["name"]}}</td>
                                <td class="column-3">Rp {{number_format($item["price"],2,',','.')}}</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m btnmin"
                                            name="btnmin">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input
                                            class="mtext-104 cl3 txt-center num-product jumlahproduct{{$item["products_id"]}}"
                                            data-product_id="{{$item["products_id"]}}" data-size="{{$item["size"]}}"
                                            type="number" name="num-product1" value="{{$item["qty"]}}">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m btnplus"
                                            name="btnplus">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">{{$item["size"]}}</td>
                                <td class="column-6" style="font-size:16px">Rp {{$item["qty"] * $item["price"]}}
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5">Cart Masih Kosong</td>
                            </tr>
                            @endforelse
                            @else
                            <tr class="table_row">
                                <td colspan="5" class="text-center">
                                    <h2>Cart Masih Kosong, <a href="{{url('shop')}}">Belanja dulu</a></h2>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                    </div> -->
                </div>
            </div>
            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">


                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>
                    @if(request()->session()->has("cart_shop_data"))
                    <!-- Subtotal -->
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                Rp {{number_format($total,2,',','.')}}
                            </span>
                        </div>
                    </div>
                    <!-- Shipping -->
                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>
                        <div class="size-209">
                            <span class="mtext-110 cl2" id="cost_ship">
                                0
                            </span>
                        </div>
                    </div>
                    <!-- Biaya Tambahan Internasional -->
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Diskon:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="stext-110 cl2">
                                @php
                                $diskon = 0;
                                $res = $total;
                                @endphp
                                @if (session()->has("data_discount_product"))
                                @php
                                $data = session()->get("data_discount_product");
                                $diskon = $data[0]["discount"];
                                $res = $total-$diskon;
                                @endphp
                                Rp {{number_format($data[0]["discount"],2,',','.')}}
                                @else
                                0
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>
                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2" id="totalharga" data-price="{{$res}}">
                                Rp {{number_format($res,2,',','.')}}
                            </span>
                        </div>
                    </div>

                    <a href="{{route('checkout.index')}}"
                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </a>
                    @else
                    <a href="{{url('shop')}}"
                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Belanja
                        Dulu</a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</form>


@endsection
@push("script")
<script language="javascript" type="text/javascript">
    $(document).ready(function() {

        $(document).on("click",'#btn-voc', function(){
            $('#formCheck').submit();
        });
        // $('#province').select2({
        //     placeholder: 'Select an province'
        // });
        function ajax() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        $(".btnmin, .btnplus").on("click", function() {
            var $row = jQuery(this).closest('tr');
            var id = $row.find("[id='products_id_tabel']")[0].value;
            var size = $row.find("[id='size_tabel']")[0].value;
            var qty = $row.find("[name='num-product1']")[0].value;
            var data = {
                'id': id,
                'size': size,
                'qty': qty
            };
            ajax();
            $.ajax({
                url: "{{route('changeqty')}}",
                method: 'post',
                data: data,
                success: function(data) {
                    if (data['status'] == true) {
                        window.location.href = "{{route('shoping_cart.index')}}";
                    }
                }
            })
        })
        $('#dropdown-city').hide();
        $('#load-data').hide();
        $(document).on("change", "select[name='province_get']", function() {
            var province_id = $(this).val();
            // console.log(province_id);
            $('#load-data').show();
            $('#dropdown-city').hide();
            $.ajax({
                url: "{{url('/shoping_cart/get_city')}}",
                method: "GET",
                data: {
                    'province_id': province_id
                },
                success: function(data) {
                    $('#city_get').html(data);
                },
                complete: function() {
                    $('#load-data').hide();
                    $('#dropdown-city').show();
                }

            })
        });

        $('#dropdown-shipping').hide();

        $(document).on("change", "#city_get", function() {
            var city_id = $(this).val();
            $('#load-data').show();
            $('#dropdown-shipping').hide();
            $.ajax({
                url: "{{route('getongkir')}}",
                method: "GET",
                data: {
                    "city_id": city_id
                },
                success: function(data) {
                    $('#ongkir').html(data);
                },
                complete: function() {
                    $('#load-data').hide();
                    $('#dropdown-shipping').show();
                }
            })
        });

        $(document).on("change", "#ongkir", function() {
            var price = $(this).find(':selected').attr('data-price');
            var service = $(this).val();
            var subtotal = $('#totalharga').data('price');
            var ttl_harga = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(parseInt(price) + parseInt(subtotal));
            price = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(price);
            $('#cost_ship').text(price);
            $('#totalharga').text(ttl_harga);
        });
    });
</script>

@endpush
