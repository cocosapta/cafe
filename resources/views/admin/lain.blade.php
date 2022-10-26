@extends('layouts.layout')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sistem</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Sistem</div>
                <div class="breadcrumb-item">lain-lain</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Setting</h2>
            <p class="section-lead">
                Semua settingan dalam User interface.
            </p>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="card-body">
                            <h4>General</h4>
                            <p>General settings digunakan untuk merubah title, logo, nomor WhatsApp, Email dan Lokasi</p>
                            <a href="{{route('general')}}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="card-body">
                            <h4>SEO</h4>
                            <p>Pengaturan link Akun Media Sosial Perusahaan meliputi Intagram, Facebook, Twitter, Web</p>
                            <a href="{{route('seo')}}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-power-off"></i>
                        </div>
                        <div class="card-body">
                            <h4>Tampilan</h4>
                            <p>Digunakan Untuk merubah tampilan dalam page About, Opening Hours</p>
                            <a href="{{route('system')}}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection