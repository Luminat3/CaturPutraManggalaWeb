@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Settings</h1>
@stop

@section('content')
<div class="container">
    <div class="card card-primary">
        <!-- .card-body -->
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
        <div class="card-body">
            <form action="/dashboard/settings/update" method="POST" enctype="multipart/form-data">
                @csrf
                <table id="tableTransaksi" class="table">
                    <thead>
                        <tr>   
                            <th class="col-9">Jumlah PPN (dalam %)</th>
                            <th class="col-1"> 
                                <div class="row">
                                    <input type="number" class="form-control" id="inputHargaModal" name="ppn" placeholder="Masukkan PPN" value="{{ $ppn }}">
                                </div>
                            </th>
                            <th class="col-1">    
                            <h5>%</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
            </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop