@extends('layout.index')
@section('stylesheets')
<!-- TABLE STYLES-->
<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-left">
                     peserta pemeriksaan
                     {{-- <a href="" class="btn btn-outline-danger">Tambah Kategori</a> --}}
                </div>
                <div class="text-right">
                    <a href="{{route('peserta.create')}}" class="btn btn-success">Tambah Peserta</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">peserta</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th scope="col">id</th>
                                          <th scope="col">nomor_peserta</th>
                                          <th scope="col">nama_peserta</th>
                                          <th scope="col">sex</th>
                                          <th scope="col">tempat_lahir</th>
                                          <th scope="col">tgl_lahir</th>
                                          <th scope="col">alamat</th>
                                          <th scope="col">ktp_peserta</th>
                                          <th scope="col">tlp_peserta</th>
                                          <th scope="col">hapus</th>
                                          <th scope="col">aksi</th>
                                        
                                          
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">nomor_peserta</th>
                                        <th scope="col">nama_peserta</th>
                                        <th scope="col">sex</th>
                                        <th scope="col">tempat_lahir</th>
                                        <th scope="col">tgl_lahir</th>
                                        <th scope="col">alamat</th>
                                        <th scope="col">ktp_peserta</th>
                                        <th scope="col">tlp_peserta</th>
                                        <th scope="col">hapus</th>
                                        <th scope="col">aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                           @foreach ($peserta as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nomor_peserta }}</td>
                                                <td>{{ $item->nama_peserta }}</td>
                                                <td>{{ $item->getSex->jenis_kelamina }}</td>
                                                <td>{{ $item->tempat_lahir }}</td>
                                                <td>{{ $item->tgl_lahir }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->ktp_peserta }}</td>
                                                <td>{{ $item->tlp_peserta }}</td>
                                                
                                            <td>
                                        <a href="{{ route('peserta.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('peserta.show', $item->id) }}" class="btn btn-info">lihat</a>
                                        {{-- <a href="{{ route('peserta.edit', $item->id) }}" class="bt n btn-warning">Edit</a> --}}
                                        {{-- <a href="{{ route('peserta.pemeriksaan.index', $item->id) }}" class="btn btn-info">tambah pemeriksaan</a> --}}
                                    </td>
                                    <td>
                                        <form action="{{ route('peserta.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">hapus</button>
                                        </form>
                                    </td>                                                            
                                              </tr>
                                              @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
</div>
<!-- /. ROW  -->
@endsection
@section('scripts')
 <!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
@endsection
