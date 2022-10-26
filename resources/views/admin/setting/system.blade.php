@extends('layouts.layout')

@section('content')

<div class="main-content">
    @if(session()->has('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success"></span> Data telah di Simpan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>General Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">General Settings</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">All About General Settings</h2>
            <p class="section-lead">
                Anda dapat menyesuaikan semua pengaturan umum di sini
            </p>

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jump To</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="{{route('general')}}" class="nav-link">General</a></li>
                                <li class="nav-item"><a href="{{route('seo')}}" class="nav-link ">SEO</a></li>
                                <li class="nav-item"><a href="{{route('system')}}" class="nav-link active">System</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @foreach($a as $item)
                    <form id="setting-form" action="{{url('about.edit',$item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>Tampilan About</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Digunakan Untuk merubah tampilan dalam page About</p>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Story Singkat Tempat paragraf 1</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control @error('story') is-invalid @enderror" name="story" id="site-description">{{$item->story}}</textarea>
                                        @error('story')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-text text-muted">Disarankan Untuk Menggunakan min 4 kalimat atau 70 kata</div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Story Singkat Tempat paragraf 2</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control @error('story_s') is-invalid @enderror" name="story_s" id="site-description">{{$item->story_s}}</textarea>
                                        @error('story_s')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-text text-muted">Disarankan Untuk Menggunakan min 4 kalimat atau 70 kata</div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Diskripsi Tempat Paragraf 1</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control @error('diskripsi') is-invalid @enderror" name="diskripsi" id="site-description">{{$item->diskripsi}}</textarea>
                                        @error('diskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Diskripsi Tempat paragraf 2</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control @error('diskripsi_s') is-invalid @enderror" name="diskripsi_s" id="site-description">{{$item->diskripsi_s}}</textarea>
                                        @error('diskripsi_s')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Gambar Cafe</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <input type="hidden" name="oldImage" value="{{ $item->gambar }}">
                                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                                        </div>
                                        @error('gambar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right"></label>
                                    <div class="col-sm-6 col-md-9">
                                        <img src="{{ asset('storage/'.$item->gambar) }}" height="40%" width="40%">Gambar Lama</img>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save</button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Tampilan Opening Hours</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Digunakan Untuk merubah tampilan dalam Opening Hours</p>
                            <div class="form-group row align-items-center">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <td>Hari</td>
                                            <td>Buka</td>
                                            <td>Tutup</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($o as $item)
                                        <tr>
                                            <td>{{$item->hari}}</td>
                                            <td>{{$item->jam}}</td>
                                            <td>{{$item->tutup}}</td>
                                            <td>
                                                <a class="btn"><i class="fa fa-edit" data-toggle="modal" data-target="#edit-{{$item->id}}"></i></a>
                                            </td>

                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@foreach( $o as $item)
<div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Jam Buka Hari {{$item->hari}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('hari.edit',$item->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Buka </label>
                        <input id="jam" type="time" class="form-control @error('jam') is-invalid @enderror" name="jam" value="{{old('jam',$item->jam) }}" required autocomplete="jam" autofocus>

                        @error('jam')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tutup </label>
                        <input id="tutup" type="time" class="form-control @error('tutup') is-invalid @enderror" name="tutup" value="{{old('tutup',$item->tutup) }}" required autocomplete="tutup" autofocus>

                        @error('tutup')
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
@endforeach
@endsection
