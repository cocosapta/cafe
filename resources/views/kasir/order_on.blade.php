@extends('layouts.layout')
@section('content')
<div class="main-content">
@if(session()->has('success'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success"></span> Data Success dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@foreach($t as $item)
<?php 
$title= $item->title;
$lokasi= $item->lokasi_s;

?>
@endforeach
<section class="section">
    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <h4>Reservasi </h4>
            </div>
            <div class="card-body">
                <div class="section-title mt-0">Reservasi</div>
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor WhatsApp</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($r as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item['nama']}}</td>
                            <td>{{$item['wa']}}</td>
                            <td>{{$item['tgl']}}</td>
                            <td>{{$item['kode']}}</td>
                            <td>
                                <form action="#" method="post">
                                    <a id="status" name="status"  target="_blank" href="https://api.whatsapp.com/send?phone={{$item['wa']}}&text=Atas%20nama:%0A{{$item->nama}}%0A%0ADari:%0A{{$title}}%0A{{$lokasi}}%0A%0ATerima%20kasih%20atas%20reservasi%20anda%20di%20{{$title}}%0AJika%20anda%20memerlukan%20informasi%20lebih%20lanjut,%20anda%20bisa%20menghubungi%20nomor%20ini.%0A%0ARincian%20pemesanan:%0ANama%20Tamu:%20{{$item->nama}},%0ATanggal:%20{{$item->tgl}},%0AJumlah%20Orang:%20{{$item->orang}},%0AKebijakan%20Reservasi:%20Tempat%20dipesan%20dengan%20garansi,pembatalan%20kurang%20dari%2030%20menit%20dari%20waktu%20kedatangan%20tidak%20akan%20hangus.%20Jika%20lebih%20dari%201%20jam%20maka%20akan%20hangus.%0A%0AKode%20bukti%20Reservasi%20anda%20yaitu%20{{$item->kode}}%0A%0ASilakan%20tunjukan%20kode%20ketika%20pembayaran%20di%20tempat%0ATerima%20kasih%20untuk%20pemesanan%20anda.%0A%0AHoramat%20saya.&source&data="><i class="fab fa-whatsapp" style="color: green;"></i></a>
                                    <a href="{{url('reservasi.hapus',$item->id_booking)}}" class="btn"><i class="fa fa-trash" style="color: red;"></i></a>
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