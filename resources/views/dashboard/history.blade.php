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
                        <th>Nama Pembeli</th>
                        <th>Id Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detail_transaksi as $detail)
                        <tr>
                            <td>{{$detail['id_customer']}}</td>
                            <td>{{$detail['id_barang']}}</td>
                            <td>{{$detail['jumlah']}}</td>
                            <td>
                                @if($detail['transaksi_selesai'] == "0" )
                                    Belum Selesai
                                @else
                                    Selesai
                                @endif
                            </td>
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