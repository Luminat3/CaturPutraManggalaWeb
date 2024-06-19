@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>User</h1>
@stop

@section('content')
<div class="card">
    {{-- Error Handling --}}
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {!! implode('', $errors->all(':message')) !!}
        </div>
    @endif
                <!-- /.card-header -->
    <div class="card-body">
        <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#modalTambahUser">Tambah User</button>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
            <th class="col-2">ID User</th>
            <th class="col-2">Nama</th>
            <th class="col-3">Email</th>
            <th class="col-2">Role</th> 
            <th class="col-4">Edit/Delete</th>
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
                    <a href="/dashboard/user/update/{{$user->id}}" class="btn btn-warning">Edit</a>
                    <a href="/dashboard/user/delete/{{$user->id}}" class="btn btn-danger">Delete</a>
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

@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop





<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->