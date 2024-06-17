@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>History Barang</h1>
@stop

@section('content')
    <div class="card">
                <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$data['id_barang']}}</td>
                            <td>{{$data['nama_barang']}}</td>
                            <td>{{$data['jumlah']}}</td>
                            <td>{{$data['keterangan']}}</td>
                            <td>
                                @if ($data['image_bukti'] == null)
                                
                                @else
                                    <a href = "storage/app/public/bukti/{{$data['image_bukti']}}">Lihat Bukti</a>
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