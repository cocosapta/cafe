@extends('layouts.layout')
@section('content')
<div class="main-content">
    @if(session()->has('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success"></span> Data telah di tambah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    @endif
    @if(session()->has('destroy'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success"></span> Data Success di Hapus
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
                    <h4>Galery</h4>
                </div>
                <div class="card-body">
                    <div class="card">
                        <input class="btn btn-success" type="button" value="Tambah Foto" data-toggle="modal" data-target="#tambah">
                    </div>
                    <div class="section-title mt-0">Galery</div>
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($g as $item)
                            <tr>

                                <td>{{$no++}}</td>
                                <td>{{$item['cerita']}}</td>
                                <td><a href="{{ asset('storage/'. $item->gambar) }}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                <td>{{$item['tgl']}}</td>
                                <td>
                                    <a class="btn"><i class="fa fa-edit" data-toggle="modal" data-target="#edit-{{$item->id}}"></i></a>
                                    <a href="{{url('galery.hapus',$item->id)}}" class="btn"><i class="fa fa-trash" style="color: red;"></i></a>

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
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ url('galery.add') }}">
                    @csrf
                    <div class="form-group">
                        <label>Kondisi </label>
                        <textarea class="form-control" name="cerita" id="site-description">{{old('cerita') }}</textarea>
                        @error('cerita')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input id="tgl" type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" value="{{old('tgl') }}" required autocomplete="tgl" autofocus>

                        @error('tgl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">

                        <!-- error message untuk title -->
                        @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach( $g as $item)
<div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('galery.edit',$item->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Kondisi </label>
                        <textarea class="form-control" name="cerita" id="site-description">{{old('cerita',$item->cerita) }}</textarea>
                        @error('cerita')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input id="date" type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" value="{{ old('tgl',$item->tgl) }}" required autocomplete="tgl" autofocus>

                        @error('tgl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $item->photo }}">
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ asset('storage/'. $item->photo) }}">

                        <!-- error message untuk title -->
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('storage/'. $item->photo) }}" height="40%" width="40%"> </img>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection