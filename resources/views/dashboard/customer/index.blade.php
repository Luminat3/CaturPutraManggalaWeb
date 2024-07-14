@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer</h1>
@stop

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    {{-- Error Handling --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

  <div class="card">
              <!-- /.card-header -->
    <div class="card-body">
      <table id="myTable" class="table table-bordered table-hover">
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
              <h4>Jika customer ini dihapus, Semua transaksi yang pernah dilakukan masih akan tersimpan.</h4>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $('#myTable').DataTable( {
            order: []
        } );
        let table = new DataTable('#myTable');
    </script>


@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop





<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->
