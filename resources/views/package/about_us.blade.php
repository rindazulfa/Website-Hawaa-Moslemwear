@extends('layouts.app')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">About Us</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>About</span></p>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{$profile->picture}});">
			</div>
			<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
				<div class="heading-section-bold mb-5 mt-md-5">
					<div class="ml-md-0">
						<h2 class="mb-4">Hawaa Moslemwear</span></h2>
					</div>
				</div>
				<div class="pb-md-5">
					<p>{{$profile->desc_1}}</p>
					<p>{{$profile->desc_2}}</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light ftco-services">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h1 class="big">Services</h1>
				<h2>We want you to express yourself</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-4">
						<span class="flaticon-002-recommended"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Refund Policy</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-4">
						<span class="flaticon-001-box"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Premium Packaging</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-4">
						<span class="flaticon-003-medal"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Superior Quality</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection