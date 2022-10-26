<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  @foreach($t as $item)
  <title>{{$item['title']}}</title>
  @endforeach

  <link rel="shortcut icon" href="{{ asset('storage/'. $item->logo) }}" type="image/x-icon">
  <link rel="apple-touch-icon" href="{{asset('yami/')}}/images/apple-touch-icon.png">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('template/')}}/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="{{asset('template/')}}/node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="{{asset('template/')}}/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="{{asset('template/')}}/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('template/')}}/assets/css/style.css">
  <link rel="stylesheet" href="{{asset('template/')}}/assets/css/components.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('all.search')
        <ul class="navbar-nav navbar-right">
          @include('all.pesan')
          @include('all.notif')
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{asset('template/')}}/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
      @include('all.menu')
      <!-- Main Content -->
      @yield('content')
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet">VokasiUB</div> Design By <a href="#">Cocosapta</a>
        </div>
        <div class="footer-right">
          FV Teknologi Informasi dan Komputer
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('template/')}}/assets/js/stisla.js"></script>
  

  <!-- JS Libraies -->
  <script src="{{asset('template/')}}/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="{{asset('template/')}}/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="{{asset('template/')}}/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="{{asset('template/')}}/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="{{asset('template/')}}/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="{{asset('template/')}}/assets/js/scripts.js"></script>
  <script src="{{asset('template/')}}/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('template/')}}/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="{{asset('template/')}}/assets/js/page/index.js"></script>
</body>

</html>