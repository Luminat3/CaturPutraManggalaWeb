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
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$data['nama_barang']}}</td>
                            <td>{{$data['jumlah']}}</td>
                            <td>{{$data['created_at']}}</td>
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