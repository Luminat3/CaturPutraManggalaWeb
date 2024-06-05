@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Riwayat</h1>
@stop

@section('content')
    <div class="card">
                <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID Pembelian</th>
                        <th>Nama Pembeli</th>
                        <th>Lokasi</th>
                        <th>Tanggal Pelunasan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $transaksit)
                        <tr>
                            <td>{{$transaksi['id']}}</td>
                            <td>{{$transaksi['company_name']}}</td>
                            <td>{{$transaksi['lokasi']}}</td>
                            <td>{{$transaksi['nomor_telepon']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
                <!-- /.card-body -->
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->