@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Stok Barang</h1>
@stop

@section('content')
    <table border="3">
        <tr>
            <td width='100px'>Id Barang</td>
            <td width='180px'>Nama Barang</td>
            <td width='120px'>Jumlah Barang</td>
        </tr>
        @foreach($stock as $stock)
        <tr>
            <td>{{$stock['id']}}</td>
            <td>{{$stock['nama_barang']}}</td>
            <td>{{$stock['jumlah']}}</td>
        </tr>
        @endforeach
    </table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->