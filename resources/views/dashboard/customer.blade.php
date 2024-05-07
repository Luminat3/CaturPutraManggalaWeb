@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pelanggan</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List Pelanggan</h3>
    </div>
              <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID Pelanggan</th>
          <th>Nama Pelanggan</th>
          <th>Lokasi</th>
          <th>Nomor Telepon</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customer as $customer)
          <tr>
              <td>{{$customer['id']}}</td>
              <td>{{$customer['company_name']}}</td>
              <td>{{$customer['lokasi']}}</td>
              <td>{{$customer['nomor_telepon']}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
              <!-- /.card-body -->
  </div>
  <button type="submit" class="btn btn-primary">Add Customer</button>
@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop





<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->