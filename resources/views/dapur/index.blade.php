@extends('all.dapur_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tabel Menu Order</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Meja</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            @foreach ($o as $item)
            <tbody>
                @if ($item->status_order == 'b')
                <tr>

                    <td>{{$no++}}</td>
                    <td>{{$item['nama']}}</td>
                    <td>{{$item['total']}}</td>
                    <td>{{$item['nama_pengguna']}}</td>
                    <td>{{$item->meja}}</td>
                </tr>
                @endif
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="card-footer bg-whitesmoke">
        This is card footer
    </div>
</div>
@endsection