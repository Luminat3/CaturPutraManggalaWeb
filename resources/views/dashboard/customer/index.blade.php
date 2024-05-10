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
          <th class="col-1">ID Pelanggan</th>
          <th class="col-2">Nama Pelanggan</th>
          <th class="col-3">Lokasi</th>
          <th class="col-4">Nomor Telepon</th>
          <th class="col-4">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customer as $customer)
          <tr>
              <td>{{$customer['id']}}</td>
              <td>{{$customer['customer_name']}}</td>
              <td>{{$customer['lokasi']}}</td>
              <td>{{$customer['nomor_telepon']}}</td>
              <td>
                <a href="/dashboard/customer/get/{{$customer->id}}" class="btn btn-warning">Edit</a>
                <a href="/dashboard/customer/delete/{{$customer->id}}" class="btn btn-danger">Delete</a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
              <!-- /.card-body -->
  </div>
  <a class="btn btn-primary" href="/dashboard/customer/create">Add Customer</a>
@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop





<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->