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
                                <th scope="col">Action</th>

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
                                <td>
                                    <a class="btn"><i class="fa fa-edit" data-toggle="modal" data-target="#edit-{{$item->id}}"></i></a>
                                    <a href="{{url('hapus',$item->id)}}" class="btn"><i class="fa fa-trash" style="color: red;"></i></a>

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

@foreach( $m as $item)
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
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.edit',$item->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Nama </label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama',$item->nama) }}" required autocomplete="nama" autofocus>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input id="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori',$item->kategori) }}" required autocomplete="kategori" autofocus>

                        @error('kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{old('harga',$item->harga) }}" required autocomplete="harga" autofocus>

                        @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$item->description) }}" required autocomplete="description" autofocus>

                        @error('description')
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