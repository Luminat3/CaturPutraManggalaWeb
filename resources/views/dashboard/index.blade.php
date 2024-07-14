@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
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
        <a href="/dashboard/transaction" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->


    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $jumlah_pengguna }}</h3>

          <p>Jumlah Pengguna</p>
        </div>
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <a href="/dashboard/customer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
        <a href="/dashboard/history" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

<div class="row">
  <div class="col-auto card">
    <div class="card-body">
      <h3>Transaksi Terkini</h3>
      <table id="example2" class="table table-bordered table-hover">
            <thead class="bg-primary">
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historyData as $historyData)
                    <tr>
                        <td>{{$historyData['id_barang']}}</td>
                        <td>{{$historyData['nama_barang']}}</td>
                        <td>{{$historyData['jumlah']}}</td>
                        <td>{{$historyData['keterangan']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

  <div class="col card flex">
    {!! $chart->container()!!}
  </div>

</div>





@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script src="{{$chart->cdn()}}"></script>
  {{$chart -> script()}}
@stop
