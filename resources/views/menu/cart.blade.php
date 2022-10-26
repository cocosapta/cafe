<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    @foreach($t as $item)
    <title>{{$item->title}}</title>
    <link rel="shortcut icon" href="{{ asset('storage/'. $item->logo) }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('yami/')}}/images/apple-touch-icon.png">
    @endforeach
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('template/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/components.css')}}">
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg ">
                <div class="col-lg-12">
                    @foreach($t as $item)
                    <img src="{{ asset('storage/'. $item->logo) }}" height="70" width="160"></img>
                    @endforeach
                </div>
            </div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="navbar text-center">
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>
                </div>
                <div class="nav-collapse">
                </div>
            </nav>
            <!-- Main Content -->
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Ckeckout</h1>
                    </div>

                    <div class="section-body">
                        <div class="invoice">
                            <div class="invoice-print">
                                <div class="row">
                                    <div class="col-lg-12">


                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="section-title">Menu</div>
                                        <p class="section-lead">Menu yang di Order</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-md">
                                                <?php
                                                $no = 1;
                                                $grandtotal = 0;
                                                ?>
                                                <tr>
                                                    <th data-width="40">#</th>
                                                    <th>Item</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Jumlah</th>
                                                    <th class="text-right">Totals</th>
                                                </tr>
                                                @foreach($o as $item)
                                                <?php
                                                $subtotal = $item->harga * $item->total;
                                                $grandtotal += $subtotal;
                                                $id = $item->nama_pengguna;
                                                ?>
                                                <form action="{{url('order.tambah',$item->id)}}" method="POST">
                                                    @csrf
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$item->nama}}</td>
                                                        <td class="text-center">{{$item->harga}}</td>
                                                        <td class="text-right">
                                                            {{$item->total}}
                                                        </td>
                                                        <td class="text-right">{{$subtotal}} </td>
                                                    </tr>
                                                </form>
                                                @endforeach
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <table>
                                                <div class="col-lg-8 text-right">
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-name">Subtotal</div>
                                                        <div class="invoice-detail-value">{{$grandtotal}}</div>
                                                    </div>
                                                </div>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-md-right">
                                <div class="float-lg-left mb-lg-0 mb-3">
                                    <a href="{{url('menu.order')}}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus"></i> Tambah</a>
                                </div>
                                <a href="/" class="btn btn-success btn-icon icon-left"><i class="fas fa-check"></i> Selesai</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
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
    <script>
        const counter = document.getElementById("counter");
        let counterValue = counter.value;

        function handleCounterPlus() {
            counter.value = ++counterValue;
        }

        function handleCounterMinus() {
            counter.value = --counterValue;
        }
    </script>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{asset('template/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{asset('template/assets/js/scripts.js')}}"></script>
    <script src="{{asset('template/assets/js/custom.js')}}"></script>
</body>

</html>