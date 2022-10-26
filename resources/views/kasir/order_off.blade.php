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
                            <th scope="col">Harga</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($r as $item)
                        <tr>
                            <td>{{$item['nama']}}</td>
                            <td>{{$item['harga']}}</td>
                            <td>{{$item['kategori']}}</td>
                            <td>{{$item['description']}}</td>
                            <td>
                                <form action="#" method="post">
                                    <a id="status" name="status" value="ready" type="submit"><i class="fa fa-eye" style="color: green;"></i></a>
                                    <a href="#" id="status" name="status" value="sold out" type="submit"><i class="fa fa-eye-slash" style="color: red;"></i></a>
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