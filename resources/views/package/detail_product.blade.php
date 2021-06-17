@extends('layouts.app')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">Product Single</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span class="mr-2"><a href="/shop">Product</a></span> <span>Product Single</span></p>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="#" class="image-popup"><img src="{{asset('/uploads/products/'.$detail["pict_1"])}}" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3>{{$detail->name}}</h3>
				<p class="price"><span>Rp {{number_format($detail->price,2,',','.')}}</span></p>
				<p>{{$detail->desc}}</p>
				@guest
				@else
				<div class="flex-w flex-r-m p-b-10" id="stok">
					<div class="size-203 flex-c-m respon6">
						Stok
					</div>
					<div class="size-204 respon6-next stok" data-stok="">

					</div>
				</div>
				<form action="{{route('shop_detail', [$detail->id])}}" method="post" id="formDetail">
					@csrf
					<input type="hidden" name="products_id" class="products_id" value="{{$detail->id}}">
					<div class="row mt-4">

						<div class="col-md-6">
							<div class="form-group d-flex">
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="size" id="size" class="form-control">
										<!-- <option value="S">Small</option>
	                    <option value="M">Medium</option>
	                    <option value="L">Large</option>
						<option value="XL">Extra Large</option>
						<option value="XXL">Double Large</option> -->
										<option value="0">Pilih Ukuran</option>
										@forelse($detail->stok as $key)
										<option value="{{ $key->size }}" data-product="{{$key->products_id}}">
											{{ ($key->qty) > 0 ? $key->size : ''}}
										</option>
										@empty
										<option value="">Tidak Tersedia</option>
										@endforelse
									</select>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="input-group col-md-6 d-flex mb-3">
							<span class="input-group-btn mr-2">
								<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
									<i class="ion-ios-remove"></i>
								</button>
							</span>
							<input type="text" id="qty" name="qty" class="form-control input-number" value="1" min="1" max="100">
							<span class="input-group-btn ml-2">
								<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
									<i class="ion-ios-add"></i>
								</button>
							</span>
						</div>
					</div>

					<!-- <p><a href="cart.html" id="btnShopCart" class="btn btn-primary py-3 px-5">Add to Cart</a></p> -->
					<button type="button" id="btnShopCart" class="btncart flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
						Add to cart
					</button>
				@endguest
				</form>
			</div>
		</div>
	</div>
</section>

@endsection

@push('script')

<script>
	$(document).ready(function() {

		$('#stok').hide();
		$(document).on("change", function() {
			var products_id = $(this).find(':selected').data("product");
			var size = $(this).find(':selected').val();

			if (size == 0) {
				$('#stok').hide();
				return false;
			}

			$.ajax({
				url: "{{url('/shop/stok')}}",
				method: "GET",
				data: {
					'products_id': products_id,
					'size': size
				},
				success: function(data) {
					$('.stok').data('stok', data["stok"]);
					$('.stok').text(data['stok']);
				},
				complete: function() {
					$('#stok').show();
				}
			})
		});

		$(document).on("click", '#btnShopCart', function() {
			var size = $('#size').find(':selected').val();
			var qty = $('.qty').val();
			var stok = $('.stok').data('stok');

			if (size == 0) {
				//   alert("Please choose size");

				Swal.fire({
					text: "Sorry, Please choose size.",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light"
					}
				});
				return false;
			}

			if (qty == 0) {

				Swal.fire({
					text: "Sorry, Please add qty.",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light"
					}
				});
				return false;
			}

			if (qty > stok) {
				Swal.fire({
					text: "Sorry, Max qty is " + stok,
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light"
					}
				});
				return false;
			}

			$('#formDetail').submit();
		});
	})
</script>
@endpush