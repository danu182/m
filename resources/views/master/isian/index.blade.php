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
                     category pemeriksaan
                     {{-- <a href="" class="btn btn-outline-danger">Tambah category</a> --}}
                </div>
                <div class="text-right">
                    <a href="{{route('isianpemeriksaan.create')}}" class="btn btn-success">Tambah</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables SPRI / Data Nomor Surat Kontrol</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                         <th>id</th>
                                            <th>nama_pemeriksaan</th>
                                            <th>description</th>
                                            <th>aksi</th>
                                            <th>hapus</th>

                                          
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>id</th>
                                            <th>nama_pemeriksaan</th>
                                            <th>description</th>
                                            <th>aksi</th>
                                            <th>hapus</th>

                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                           @foreach ($pemeriksaan as $item)
                                            <tr>
                                                <td>{{ $item->periksa_id }}</td>
                                                <td>{{ $item->nama_pemeriksaan }}</td> 
                                                <td>{{ $item->descripcion }}</td> 
                                              
                                                @if ($item->kategori_isian)
                                                <td>{{ $item->kategori_isian }}</td> 
                                                <td><a href="{{ route('coba.show', $item->periksa_id) }}" class="btn btn-warning">ubah</a></td>
                                                @else
                                              
                                                <td>---</td> 
                                                <td><a href="{{ route('coba.edit', $item->periksa_id) }}" class="btn btn-info">tambah</a></td>
                                                    
                                                @endif
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
<script src="{{ asset('assets/js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('ass')}}"></script>
<script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.js')}}"></script>>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>

@endsection
