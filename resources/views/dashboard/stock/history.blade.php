@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>History Barang</h1>
@stop

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <div class="card">
                <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$data['id_barang']}}</td>
                            <td>{{$data['nama_barang']}}</td>
                            <td>{{$data['jumlah']}}</td>
                            <td>{{$data['keterangan']}}</td>
                            <td>
                                @if ($data['image_bukti'] == null)
        
                                @else
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pictureModal" onclick="openModal('{{ url('storage/'.$data->image_bukti) }}')">
                                       Buka Bukti Transaksi
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
                <!-- /.card-body -->
    </div>
@stop


<!-- Modal -->
<div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="pictureModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pictureModalLabel">Picture Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img id="modalImage" src="" alt="" class="img-fluid">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openModal(imageUrl) {
      // Set the src attribute of the img tag to the imageUrl
      document.getElementById('modalImage').src = imageUrl;
      // Optionally, set the modal title or other dynamic content
      document.getElementById('pictureModalLabel').textContent = 'Bukti Transaksi';
    }
  </script>

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->