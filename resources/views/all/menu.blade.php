<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      @foreach($t as $item)
      <a href="index.html"><img src="{{ asset('storage/'. $item->logo) }}" height="110%" width="60%"></img></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html"><img src="{{ asset('storage/'. $item->icon) }}" height="80%" width="80%"></img></a>
    </div>
    @endforeach
    @if(auth()->user()->level =='admin')
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="{{route('admin.home')}}"><i class="fa fa-fire"></i> <span>Dashboard</span></a></li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-cogs"></i> <span>Sistem</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{url('user')}}">User Dashboard</a></li>
          <li><a class="nav-link" href="{{url('lain')}}">lain-lain</a></li>
        </ul>
      </li>
      <li class="menu-header">Produk</li>
      <li><a class="nav-link" href="{{route('data.menu')}}"><i class="fa fa-book"></i> <span>Data Menu</span></a></li>
      <li><a class="nav-link" href="{{route('admin.menu')}}"><i class="fa fa-book"></i> <span>Menu Baru</span></a></li>
      <li><a class="nav-link" href="{{route('admin.galery')}}"><i class="fa fa-book"></i> <span>Galery</span></a></li>
    </aside>
  </div>
  @elseif(auth()->user()->level =='kasir')
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li><a class="nav-link" href="{{url('order.on')}}"><i class="far fa-square"></i> <span>Order Online</span></a></li>
    <li><a class="nav-link" href="{{url('menu.cek')}}"><i class="far fa-square"></i> <span>Menu</span></a></li>
  <li><a class="nav-link" href="{{url('dashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
  <li><a class="nav-link" href="{{url('kasir')}}"><i class="far fa-square"></i> <span>Kasir</span></a></li>
</ul>
</aside>
</div>
@endif