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

                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Meja</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        <tbody>
                            @foreach ($k as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item['nama']}}</td>
                                <td>{{$item['meja']}}</td>
                                <td>{{$item['tgl']}}</td>
                                <td>
                                    <a class="btn " type="submit" data-toggle="modal" data-target="#edit-{{$item->nama}}"><i class="fas fa-credit-card" style="color: green;"></i></a>
                                    <button class="btn " type="submit"><i class="fa  fa-times" style="color: red;"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
$nomor = 1;
$grandtotal = 0;
?>
@foreach( $o as $val)
<?php
$subtotal = $val->harga * $val->total;
$grandtotal += $subtotal;
?>
<div class="modal fade" id="edit-{{$val->nama_pengguna}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover table-md">
                    <tr>
                        <th data-width="40">#</th>
                        <th>Item</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Total</th>
                    </tr>
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$val["nama"]}}</td>
                        <td class="text-center">Rp.{{$val["harga"]}}</td>
                        <td class="text-center">{{$val["total"]}}</td>
                        <td class="text-right">Rp.{{$subtotal}} </td>
                    </tr>
                    <!-- <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Subtotal</td>
                        <td class="text-right">Rp.{{$grandtotal}} </td>
                    </tr> -->
                </table>
                <div class="modal-footer">
                    <a href="{{url('lanjut')}}" type="submit" class="btn btn-md btn-primary">Lanjut</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection