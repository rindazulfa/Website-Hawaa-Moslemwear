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
			<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{'uploads/profil/'.$profile->picture}});">
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

@endsection