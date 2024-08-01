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
                      paket {{ $paket->nama_paket }}
                     {{-- <a href="" class="btn btn-outline-danger">Tambah Kategori</a> --}}
                </div>
                <div class="text-right">
                    <a href="{{route('paket.paketdetail.create',$paket)}}" class="btn btn-success">Tambah</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">paket -> {{ $paket->nama_paket }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                         <th>id</th>
                                            <th>nama_pemeriksaan</th>
                                            <th>description</th>
                                            <th>edit</th>
                                            <th>hapus</th>

                                          
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>id</th>
                                            <th>nama_pemeriksaan</th>
                                            <th>description</th>
                                            <th>edit</th>
                                            <th>hapus</th>

                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                           @foreach ($paketDetail as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->getPemeriksaan->nama_pemeriksaan }}</td> 
                                                <td>{{ $item->getPemeriksaan->descripcion }}</td> 
                                                {{-- <td>{{ $item->kategori_id }}</td> --}}
                                                    {{-- <td>{{ $item['Relasi_kategori']['nama_kategori'] }}</td> --}}
                                                  <td>
                                                    {{-- <a href="{{ route('paket.pemeriksaan.edit',[$item->paket_id, $paket->id ]) }}" class="btn btn-warning">Edit</a> --}}
                                                    {{-- <a href="{{ route('paket.pemeriksaan.edit',[$item->paket_id, $item->id ]) }}" class="btn btn-warning">Edit</a> --}}
                                                </td>
                                                <td>
                                                    <form action="{{ route('paketdetail.destroy', [$item->paket_id, $item->id])  }}" method="post">
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
