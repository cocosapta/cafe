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
                                <li class="nav-item"><a href="{{route('general')}}" class="nav-link ">General</a></li>
                                <li class="nav-item"><a href="{{route('seo')}}" class="nav-link active">SEO</a></li>
                                <li class="nav-item"><a href="{{route('system')}}" class="nav-link">System</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @foreach($s as $item)
                    <form id="setting-form" action="{{url('seo.edit',$item->id)}}" method="POST" >
                        @csrf
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>SEO Settings</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Pengaturan link Akun Media Sosial Perusahaan meliputi Intagram, Facebook, Twitter, Web</p>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Intagram</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" value="{{old('ig',$item->ig) }}" name="ig" class="form-control @error('ig') is-invalid @enderror">
                                        @error('ig')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Facebook</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="fb" value="{{old('fb',$item->fb) }}" placeholder="{{$item->fb }}" class="form-control @error('fb') is-invalid @enderror">
                                        @error('fb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Twitter</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="tw" value="{{old('phone',$item->tw) }}" class="form-control @error('tw') is-invalid @enderror">
                                        @error('tw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Web</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="web" value="{{old('phone',$item->web) }}" class="form-control @error('web') is-invalid @enderror">
                                        @error('web')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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