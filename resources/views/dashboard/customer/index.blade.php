@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer</h1>
@stop

@section('content')
  <div class="card">
              <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th class="col-2">ID Customer</th>
          <th class="col-2">Nama Customer</th>
          <th class="col-3">Lokasi</th>
          <th class="col-3">Nomor Telepon</th>
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
                <button type="button" class="btn btn-danger my-2" data-toggle="modal" data-target="#modalConfirm">Delete</button>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
              <!-- /.card-body -->
  </div>
  <a class="btn btn-primary" href="/dashboard/customer/create">Tambah Customer</a>




<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Are you sure ?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>    
              <div class="modal-body">
              <h4>Apakah anda ingin menghapus customer ini ?</h4>
              <h4>Jika customer ini dihapus, maka semua data Transaksi yang pernah dilakukan dengan customer ini juga akan dihapus!</h4>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <form action="/dashboard/customer/delete/{{$customer->id}}" method="POST">
                    @csrf
                  <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                  <form>
              </div>
      </div>
  </div>
</div>    
@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop





<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->