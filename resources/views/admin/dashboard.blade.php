@extends('layouts.layout')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">
              <div class="dropdown d-inline">
              </div>
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count"> {{$to}}</div>
                <div class="card-stats-item-label">Order</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$ot}}</div>
                <div class="card-stats-item-label">Checkout</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$o}}</div>
                <div class="card-stats-item-label">Completed</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Orders</h4>
            </div>
            <div class="card-body">
              {{$to}}
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">
              <div class="dropdown d-inline">
              </div>
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$mi}}</div>
                <div class="card-stats-item-label">Drinks</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$co}}</div>
                <div class="card-stats-item-label">Coffe</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$sn}}</div>
                <div class="card-stats-item-label">Snack</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$ca}}</div>
                <div class="card-stats-item-label">Cake</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$fo}}</div>
                <div class="card-stats-item-label">Food</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Menu</h4>
            </div>
            <div class="card-body">
              {{$tm}}
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">
              <div class="dropdown d-inline">
              </div>
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">24</div>
                <div class="card-stats-item-label">Pending</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">12</div>
                <div class="card-stats-item-label">Shipping</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">23</div>
                <div class="card-stats-item-label">Completed</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Orders</h4>
            </div>
            <div class="card-body">
              {{$tm}}
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="card col-12">
          <div class="card-header">
            <h4>Menu Baru</h4>
          </div>
          <div class="card-body">
            <div class="section-title mt-0">Menu Baru</div>
            <table class="table table-striped">
              <thead>
                <tr>

                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach ($m as $item)
                <tr>

                  <td>{{$no++}}</td>
                  <td>{{$item['nama']}}</td>
                  <td>{{$item['harga']}}</td>
                  <td>{{$item['kategori']}}</td>
                  <td><a href="{{ asset('storage/'. $item->photo) }}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                  <td>{{$item['description']}}</td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
      <!-- <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-header">
              <h4>Order</h4>
            </div>
            <div class="card-stats-title">
              <div class="dropdown d-inline">
              </div>
            </div>
            <div class="card-body">
              <canvas id="myChart1"></canvas>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>

<script>
  var xValues = ["Order", "Checkout", "Complated"];
  var yValues = [];
  var barColors = ["red", "green", "blue"];

  new Chart("myChart1", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: true,
        text: "Order",
      }
    }
  });
</script> -->
      @endsection