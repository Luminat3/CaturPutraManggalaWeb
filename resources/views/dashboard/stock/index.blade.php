@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
      <div class="card-header">
      <h1 class="card-title">Stok Barang</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <a class="btn btn-primary my-2" href="/dashboard/stock/add">Tambah Stock</a> 
      <a class="btn btn-primary my-2" href="/dashboard/stock/create">Tambah Item</a>
      <table id="stockTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Id Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Modal</th>
          </tr>
        </thead>
        <tbody>
          @foreach($stock as $stock)
            <tr>
                <td>{{$stock['id']}}</td>
                <td>{{$stock['nama_barang']}}</td>
                <td>{{$stock['jumlah']}}</td>
                <td>{{$stock['harga_modal']}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->