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
				<div id="dprod" class="carousel slide" data-ride="carousel">
					<!-- The slideshow -->
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="{{asset('/uploads/products/'.$detail["pict_1"])}}" alt="Los Angeles" width="540" height="auto">
						</div>
						<div class="carousel-item">
							<img src="{{asset('/uploads/products/'.$detail["pict_2"])}}" alt="Chicago" width="540" height="auto">
						</div>
						<div class="carousel-item">
							<img src="{{asset('/uploads/products/'.$detail["pict_3"])}}" alt="New York" width="540" height="auto">
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="carousel-control-prev" href="#dprod" data-slide="prev">
						<div class="bg-ctrl" style="background-color: black;
						width: 40px;
						height: 40px;
						border-radius: 5px;">
							<span class="carousel-control-prev-icon" style="vertical-align: bottom; margin-top: 10px;"></span>	
						</div>
					</a>
					<a class="carousel-control-next" href="#dprod" data-slide="next">
						<div class="bg-ctrl" style="background-color: black;
						width: 40px;
						height: 40px;
						border-radius: 5px;">
							<span class="carousel-control-next-icon" style="vertical-align: bottom; margin-top: 10px;"></span>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3>{{$detail->name}}</h3>
				<p class="price"><span>Rp {{number_format($detail->price,2,',','.')}}</span></p>
				<p>{{$detail->desc}}</p>
				@guest
				@else
				<!-- <p><a href="cart.html" id="btnShopCart" class="btn btn-primary py-3 px-5">Add to Cart</a></p> -->
				<form action="{{ route('shop.store') }}" method="post">
					@csrf
					<input type="text" name="id" id="id" value="{{ $detail->id }}" hidden readonly>
					<input type="number" name="price" id="price" value="{{ $detail->price }}" hidden readonly>
					<input type="text" name="size" id="size" value="1" hidden readonly>
					<input type="number" name="qty" id="qty" value="1" hidden readonly>
					<input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" hidden readonly>
					<button type="submit" id="btnShopCart" class="btncart flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
						Add to cart
					</button>
				</form>

				@endguest
			</div>
		</div>
	</div>
</section>

@endsection

@push('script')
<script>
	$(document).ready(function() {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);


			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			// Increment
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});

	});
</script>

<script>
	$(document).ready(function() {

		$('#stok').hide();
		$(document).on("change", function() {
			var products_id = $(this).find(':selected').data("product");
			var size = $(this).find(':selected').val();

			if (size == 0) {
				// $('#stok').hide();
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
					// $('.stok').data('stok', data["stok"]);
					// $('.stok').text(data['stok']);
				},
				complete: function() {
					// $('#stok').show();
				}
			})
		});

		$(document).on("click", '#btnShopCart', function() {
			var size = $('#size').find(':selected').val();
			var qty = $('.qty').val();
			// var stok = $('.stok').data('stok');

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

			// $('#formDetail').submit();
		});
	})
</script>
@endpush