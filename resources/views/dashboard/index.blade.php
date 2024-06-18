@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $total_customer['total']}}</h3>  

          <p>Jumlah Customer</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-tag"></i>
        </div>
        <a href="dashboard/customer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $transaksi_berlangsung }}</h3>

          <p>Transaksi Berlangsung</p>
        </div>
        <div class="icon">
          <i class="fas fa-cart-plus"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->


    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $jumlah_pengguna }}</h3>

          <p>Transaksi Berlangsung</p>
        </div>
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->


    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-primary-emphasis">
        <div class="inner">
          <h3>{{ $transaksi_selesai }}</h3>

          <p>Transaksi Selesai</p>
        </div>
        <div class="icon">
          <i class="fas fa-check-square"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->