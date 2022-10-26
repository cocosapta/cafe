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
                                <li class="nav-item"><a href="{{route('general')}}" class="nav-link active">General</a></li>
                                <li class="nav-item"><a href="{{route('seo')}}" class="nav-link">SEO</a></li>
                                <li class="nav-item"><a href="{{route('system')}}" class="nav-link">System</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @foreach($t as $item)
                    <form id="setting-form" action="{{url('general.edit',$item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>General Settings</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">General settings digunakan untuk merubah title, logo, nomor WhatsApp, Email dan Lokasi</p>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Site Title</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" value="{{old('title',$item->title) }}" name="title" class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nomor WhastApp</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="phone" value="{{old('phone',$item->phone) }}" placeholder="{{$item->phone }}" class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Gmail</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="email" value="{{old('phone',$item->email) }}" class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Lokasi Secara singkat</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="lokasi_s" value="{{old('phone',$item->lokasi_s) }}" class="form-control @error('lokasi_s') is-invalid @enderror">
                                        @error('lokasi_s')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Lokasi</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="lokasi" value="{{old('phone',$item->lokasi) }}" class="form-control @error('lokasi') is-invalid @enderror">
                                        @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                        <input type="hidden" name="oldlogo" value="{{ $item->logo }}">
                                            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                                        </div>
                                            @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                <label class="form-control-label col-sm-3 text-md-right"></label>
                                    <div class="col-sm-6 col-md-9">
                                    <img src="{{ asset('storage/'.$item->logo) }}" height="40%" width="40%">Gambar Logo Lama</img>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                        <input type="hidden" name="oldicon" value="{{ $item->icon }}">
                                            <input type="file" class="form-control @error('icon') is-invalid @enderror" name="icon">
                                        </div>
                                       
                                            @error('icon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                <label class="form-control-label col-sm-3 text-md-right"></label>
                                    <div class="col-sm-6 col-md-9">
                                    <img src="{{ asset('storage/'. $item->icon) }}" height="40%" width="40%"> Gambar Favicon Lama</img>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save</button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
</div>
@endsection