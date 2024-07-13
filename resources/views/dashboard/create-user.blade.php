@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>User</h1>
@stop

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

<div class="card">
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
                <!-- /.card-header -->
    <div class="card-body">
        <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#modalTambahUser">Tambah User</button>
        <table id="myTable" class="table table-bordered table-hover">
            <thead>
            <tr>
            <th class="col-2">ID User</th>
            <th class="col-2">Nama</th>
            <th class="col-3">Email</th>
            <th class="col-2">Role</th>
            <th class="col-4">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>@if($user['is_admin'] == true)
                        Admin
                    @else
                        User
                    @endif
                </td>
                <td>
                    <form action="/dashboard/user/{{$user->id}}/delete" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>






<div class="modal fade" id="modalTambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="/dashboard/user/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama User">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email User">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password User">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_admin" name = "is_admin" value = true>
                    <label class="form-check-label" for="exampleCheck1">Centang untuk Mendaftarkan Sebagai Admin</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
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
