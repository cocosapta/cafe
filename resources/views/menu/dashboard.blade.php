@extends('layouts.meja_layout')
@section('content')


@foreach($m as $item)
@if($item->status == 'ready')
<div class="col-12 col-sm-5 col-md-5 col-lg-2">
  <article class="article article-style-b">
    <div class="article-header">
      <div class="article-image" data-background="{{ asset('storage/'. $item->photo) }}">
      </div>
    </div>
    <div class="article-details">
      <div class="article-title">
        <h2><a href="#">{{$item['nama']}}</a></h2>
      </div>
      <div class="article-title">

        <p>Rp.{{$item['harga']}} </p>
      </div>
      <form action="{{url('order')}}" method="POST">
        @csrf
        <div class="article-cta">
          <input type="number" name="total" value="0" min="1" class="form-control">
          <input type="hidden" name="id_menu" value="{{$item->id}}" class="form-control">
          <br>
          <button name="id_menu" value="{{$item->id}}" class="btn btn-primary">tambah</button>
        </div>
      </form>
    </div>
  </article>
</div>
@endif
@endforeach
@endsection