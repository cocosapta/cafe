<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    @foreach($t as $item)
    <title>{{$item->title}}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('storage/'. $item->logo) }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('yami/')}}/images/apple-touch-icon.png">
    @endforeach
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('yami/')}}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('yami/')}}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('yami/')}}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('yami/')}}/css/custom.css">

    <!--[if lt IE 9]>
      <script src="{{asset('yami/')}}/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="{{asset('yami/')}}/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{url('index')}}">
                    @foreach($t as $item)
                    <img src="{{ asset('storage/'. $item->logo) }}" height="80" width="170"></img>
                    @endforeach
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item "><a class="nav-link" href="{{url('index')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('menu')}}">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('about')}}">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Lainnya</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="{{url('reservasi')}}">Reservation</a>
                                <a class="dropdown-item" href="{{url('gallery')}}">Gallery</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->
    @yield('content')
    <!-- Start Contact info -->
    @foreach($t as $item)
    <div class="contact-imfo-box">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <i class="fa fa-volume-control-phone"></i>
                    <div class="overflow-hidden">
                        <h4>Phone</h4>
                        <p class="lead">
                            {{$item->phone}}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-envelope"></i>
                    <div class="overflow-hidden">
                        <h4>Email</h4>
                        <p class="lead">
                            {{$item->email}}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-map-marker"></i>
                    <div class="overflow-hidden">
                        <h4>Location</h4>
                        <p class="lead">
                            {{$item->lokasi_s}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact info -->
    @endforeach
    <!-- Start Footer -->
    <footer class="footer-area bg-f">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                @foreach($a as $item)
                    <h3>About Us</h3>
                    <p>{{$item->story}}</p>
                </div>
                @endforeach
                <div class="col-lg-3 col-md-6">
                    <h3>Opening hours</h3>
                    @foreach($o as $item)
                    <p><span class="text-color">{{$item->hari}} : </span>{{$item->jam}} - {{$item->tutup}}</p>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Contact information</h3>
                    @foreach($t as $item)
                    <p class="lead">{{$item->lokasi}}</p>
                    <p class="lead"><a href="#">{{$item->phone}}</a></p>
                    <p><a href="#"> {{$item->email}}</a></p>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Subscribe</h3>
                    <div class="subscribe_form">
                    </div>
                    @foreach($s as $item)
                    <ul class="list-inline f-social">
                        <li class="list-inline-item"><a href="{{$item->fb}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="{{$item->tw}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="{{$item->web}}"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="{{$item->ig}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="company-name">Copyright &copy; 2022 <a href="https://vokasi.ub.ac.id/">Vokasi UB</a> Design By :
                            <a href="https://html.design/">html design</a> ; Cocosapta
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{asset('yami/')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{asset('yami/')}}/js/popper.min.js"></script>
    <script src="{{asset('yami/')}}/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('yami/')}}/js/jquery.superslides.min.js"></script>
    <script src="{{asset('yami/')}}/js/images-loded.min.js"></script>
    <script src="{{asset('yami/')}}/js/isotope.min.js"></script>
    <script src="{{asset('yami/')}}/js/baguetteBox.min.js"></script>
    <script src="{{asset('yami/')}}/js/form-validator.min.js"></script>
    <script src="{{asset('yami/')}}/js/contact-form-script.js"></script>
    <script src="{{asset('yami/')}}/js/custom.js"></script>
</body>

</html>