@extends('layouts.user_layout')
@section('content')

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Gallery</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
						<p>Kenangan yang ada di sini</p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					@foreach ($g as $item)
					<div class="col-lg-4 col-md-6">
						<a class="lightbox" href="{{ asset('storage/'. $item->gambar) }}">
							<img class="img-fluid" src="{{ asset('storage/'. $item->gambar) }}" alt="Gallery Images">
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	
@endsection