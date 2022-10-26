@extends('layouts.layout')
@section('content')
<div class="main-content">
@if(session()->has('success'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success"></span> Menu telah di Update
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

@endif
<section class="section">
    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <h4>Menu </h4>
            </div>
            <div class="card-body">
                <div class="section-title mt-0">Menu</div>
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col">Nama</th>
                            <th scope="col">Meja</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Waktu Order</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($o as $item)
                    <tbody>
                        <tr>
                            <td>{{$item['nama_pengguna']}}</td>
                            <td>{{$item['meja']}}</td>
                            <td>{{$item['nama']}}</td>
                            <td>{{$item['total']}}</td>
                            <td>{{$item['waktu_order']}}</td>
                            <td>{{$item['status_order']}}</td>
                            <td>
                                <form action="{{url('status.order',$item->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="acc" value="acc">
                                    <button class="btn " type="submit"><i class="fa fa-check" style="color: green;"></i></button>
                                    <input type="hidden" name="cancel" value="cancel">
                                    <button class="btn " type="submit"><i class="fa  fa-times" style="color: red;"></i></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
</div>
@endsection