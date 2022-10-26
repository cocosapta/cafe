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


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('/template')}}/assets/css/style.css">
  <link rel="stylesheet" href="{{asset('/template')}}/assets/css/components.css">

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside class="sidebar" id="sidebar">
          <div class="sidebar-brand">
            @foreach($t as $item)
            <img src="{{ asset('storage/'. $item->logo) }}" height="70" width="160"></img>
            @endforeach
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            @foreach($t as $item)
            <a href="index.html">
              <img src="{{ asset('storage/'. $item->icon) }}" height="100%" width="100%"></img>
            </a>
            @endforeach

          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="{{url('menu.order')}}"><i class="fas fa-fire"></i><span>Rekomendasi</span></a></li>
            <li class="nav-item dropdown">
              <a href="{{url('menu.food')}}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-book"></i> <span>Makanan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Aneka Ayam</a></li>
                <li><a class="nav-link" href="#">Aneka Ikan Tawar</a></li>
                <li><a class="nav-link" href="#">Aneka Iga</a></li>
                <li><a class="nav-link" href="#">Aneka Seafood</a></li>
                <li><a class="nav-link" href="#">Aneka Sayuran</a></li>
                <li><a class="nav-link" href="#">Aneka Penyetan</a></li>
                <li><a class="nav-link" href="#">Aneka Nasi</a></li>
                <li><a class="nav-link" href="#">Lelenggahan</a></li>
              </ul>
            <li class="nav-item dropdown">
              <a href="{{url('menu.drinks')}}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-book"></i> <span>Minuman</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{url('menu.snack')}}">Spesial</a></li>
                <li><a class="nav-link" href="{{url('menu.coffe')}}"> Kopi</a></li>
                <li><a class="nav-link" href="#">Tradisonal</a></li>
                <li><a class="nav-link" href="#">Teh</a></li>
                <li><a class="nav-link" href="#">Juice</a></li>
                <li><a class="nav-link" href="#">Jeruk</a></li>
                <li><a class="nav-link" href="#">Milk Base</a></li>
              </ul>
            <li class="nav-item dropdown">
              <a href="{{url('menu.drinks')}}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-book"></i> <span>Paket</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{url('menu.cake')}}">Paket Singkal</a></li>
                <li><a class="nav-link" href="{{url('menu.cake')}}">Paket Tandur</a></li>
                <li><a class="nav-link" href="{{url('menu.cake')}}">Paket Panen</a></li>
                <li><a class="nav-link" href="{{url('menu.cake')}}">Paket Lumbung</a></li>
              </ul>
            <li><a class="nav-link" href="{{url('menu.cake')}}"><i class="fas fa-fire"></i><span>Kudapan</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Menu</h1>
          </div>
          <div class="section-body">
            <div class="row">
              @yield('content')
              @if ($order == 0 ) @else
              <div class="footer-right" style="position: fixed;bottom: 50px;right: 50px;  ">
                <a class="btn btn-primary" type="button" data-toggle="modal" data-target="#showcart" style="color:white ;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="color:white ;" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                  </svg>
                  {{$order}}
                </a>
              </div>
              @endif
            </div>
          </div>
        </section>

      </div>
      <footer class="main-footer">
        <div class="footer-left">

        </div>
      </footer>
    </div>
  </div>
  <div class="modal fade" id="showcart" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="largeModalLabel">Menu yang di tambah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped table-hover table-md">
                  <tr>
                    <th data-width="40">#</th>
                    <th>Item</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Harga</th>
                    <th class="text-right">Action</th>
                  </tr>
                  <?php $no = 1; ?>
                  @foreach ($o as $val)
                  @if($val->checkout == 'belum')
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$val["nama"]}}</td>
                    <td class="text-center">{{$val["description"]}}</td>
                    <td class="text-center">{{$val["harga"]}}</td>
                    <td class="text-right">
                      <a href="{{url('order.hapus',$val->id)}}">batal</a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="{{url('checkout')}}" type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">checkout</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('/template')}}/assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{asset('/template')}}/assets/js/scripts.js"></script>
  <script src="{{asset('/template')}}/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->

</body>

</html>