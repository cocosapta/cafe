@extends('layouts.user_layout')
@section('content')

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>Special Menu</h1>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->

<!-- Start Menu -->
<div class="menu-box">
	<div class="container">
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
<!-- End Menu -->


<!-- Start QT -->
<div class="qt-box qt-background">
	<div class="container">
		<div class="row">
			<div class="col-md-8 ml-auto mr-auto text-left">
				<p class="lead ">
					" If you're not the one cooking, stay out of the way and compliment the chef. "
				</p>
				<span class="lead">Michael Strahan</span>
			</div>
		</div>
	</div>
</div>
<!-- End QT -->

@endsection