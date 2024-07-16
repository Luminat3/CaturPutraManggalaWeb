@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>History Barang</h1>
@stop

@section('content')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">


    <div class="card">
                <!-- /.card-header -->
        <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover">
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $('#myTable').DataTable( {
            order: []
        } );

        let table = new DataTable('#myTable');
    </script>
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
