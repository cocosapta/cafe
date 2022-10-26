@extends('layouts.user_layout')
@section('content')

<!-- Start header -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>About Us</h1>
			</div>
		</div>
	</div>
</div>
<!-- End header -->

<!-- Start About -->
<div class="about-section-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				@foreach ($a as $item)
				<img src="{{ asset('storage/'. $item->gambar) }}" alt="" class="img-fluid" height="80%" width="170%">
				@endforeach
			</div>
			<div class="col-lg-6 col-md-6 text-center">
				<div class="inner-column">
					@foreach ($t as $item)
					<h1>Welcome To <span>{{$item->title}}</span></h1>
					@endforeach
					<h4>Little Story</h4>
					@foreach ($a as $item)
					<p>{{$item->story}}</p>
					<p>{{$item->story_s}}</p>
					@endforeach
					<a class="btn btn-lg btn-circle btn-outline-new-white" href="{{url('reservasi')}}">Reservation</a>
				</div>
			</div>
			<div class="col-md-12">
				<div class="inner-pt">
					@foreach ($a as $item)
					<p>{{$item->diskripsi}}</p>
					<p>{{$item->diskripsi_s}}</p>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End About -->

<!-- Start Menu -->
<div class="menu-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Special Menu</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
				</div>
			</div>
		</div>
		<div class="row ">
			@foreach ($f as $item)
			<div class="col-lg-4 col-md-6 ">
				<div class="gallery-single fix">
					<div style="height:fit-content; width:fit-content;">
						<img src="{{ asset('storage/'. $item->photo) }}" class="img-fluid" alt="Image">
					</div>
					<div class="article-title">
						<h2><a href="#">{{$item['nama']}}</a></h2>
						<p>Rp.{{$item['harga']}} </p>
					</div>
					<div class="why-text">
						<p>{{$item->description}}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>

	</div>
</div>
</div>
<!-- End Menu -->

@endsection