@extends('layouts.user_layout')
@section('content')

<div id="slides" class="cover-slides">
	<ul class="slides-container">
		<li class="text-center">
			<img src="{{asset('yami/')}}/images/slider-01.jpg" alt="">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- Start slides -->
						@foreach($t as $item)
						<h1 class="m-b-20"><strong>Welcome To <br> {{$item->title}}</strong></h1>
						<p class="m-b-40">See how your users experience your website in realtime or view <br>
							trends to see any changes in performance over time.</p>
						@endforeach
						<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
					</div>
				</div>
			</div>
		</li>
		<li class="text-center">
			<img src="{{asset('yami/')}}/images/slider-02.jpg" alt="">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
						<p class="m-b-40">See how your users experience your website in realtime or view <br>
							trends to see any changes in performance over time.</p>
						<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="{{url('reservasi')}}">Reservation</a></p>
					</div>
				</div>
			</div>
		</li>
		<li class="text-center">
			<img src="{{asset('yami/')}}/images/slider-03.jpg" alt="">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
						<p class="m-b-40">See how your users experience your website in realtime or view <br>
							trends to see any changes in performance over time.</p>
						<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="{{url('reservasi')}}">Reservation</a></p>
					</div>
				</div>
			</div>
		</li>
	</ul>
	<div class="slides-navigation">
		<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
		<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
	</div>
</div>

<!-- End slides -->
<!-- Start About -->
<div class="about-section-box">
	<div class="container" >
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				@foreach ($a as $item)
				<img src="{{ asset('storage/'. $item->gambar) }}" alt="" class="img-fluid" height="80%" width="170%">
				@endforeach
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 text-center">
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
		</div>
	</div>
</div>
<!-- End About -->
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


<!-- Start Gallery -->
<div class="gallery-box">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Gallery</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
				</div>
			</div>
		</div>
		<div class="tz-gallery">
			<div class="row">
				<div class="col-sm-12 col-md-4 col-lg-4">
					<a class="lightbox" href="{{asset('yami/')}}/images/gallery-img-01.jpg">
						<img class="img-fluid" src="{{asset('yami/')}}/images/gallery-img-01.jpg" alt="Gallery Images">
					</a>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<a class="lightbox" href="{{asset('yami/')}}/images/gallery-img-02.jpg">
						<img class="img-fluid" src="{{asset('yami/')}}/images/gallery-img-02.jpg" alt="Gallery Images">
					</a>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<a class="lightbox" href="{{asset('yami/')}}/images/gallery-img-03.jpg">
						<img class="img-fluid" src="{{asset('yami/')}}/images/gallery-img-03.jpg" alt="Gallery Images">
					</a>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-4">
					<a class="lightbox" href="{{asset('yami/')}}/images/gallery-img-04.jpg">
						<img class="img-fluid" src="{{asset('yami/')}}/images/gallery-img-04.jpg" alt="Gallery Images">
					</a>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<a class="lightbox" href="{{asset('yami/')}}/images/gallery-img-05.jpg">
						<img class="img-fluid" src="{{asset('yami/')}}/images/gallery-img-05.jpg" alt="Gallery Images">
					</a>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<a class="lightbox" href="{{asset('yami/')}}/images/gallery-img-06.jpg">
						<img class="img-fluid" src="{{asset('yami/')}}/images/gallery-img-06.jpg" alt="Gallery Images">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Gallery -->
@endsection