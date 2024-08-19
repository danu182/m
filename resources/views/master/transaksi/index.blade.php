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
                     pendaftaran 
                     {{-- <a href="" class="btn btn-outline-danger">Tambah pendaftaran</a> --}}
                </div>
                <div class="text-right">
                    <a href="{{route('peserta.index')}}" class="btn btn-success">Tambah</a>
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
                                             <th scope="col">id</th>
                                            <th scope="col">tgl_pendaftaran</th>
                                            <th scope="col">no_pendaftaran</th>
                                            <th scope="col">peserta</th>
                                            <th scope="col">nama_paket</th>
                                            <th scope="col">penjamin_peserta</th>
                                            <th scope="col">edit</th>
                                            <th scope="col">aksi</th>

                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th scope="col">id</th>
                                            <th scope="col">tgl_pendaftaran</th>
                                            <th scope="col">no_pendaftaran</th>
                                            <th scope="col">peserta</th>
                                            <th scope="col">nama_paket</th>
                                            <th scope="col">penjamin_peserta</th>
                                            <th scope="col">edit</th>
                                            <th scope="col">aksi</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                           @foreach ($pendaftaran as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->tgl_pendaftaran }}</td>
                                                <td>{{ $item->no_pendaftaran }}</td>
                                                <td>{{ $item->getPeserta->nama_peserta }}</td>
                                                <td>{{ $item->getPaket->nama_paket }}</td>
                                                <td>{{ $item->getPerusahaan->nama_perusahaan }}</td>
                                                
                                            <td>
                                        <a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-warning">isi transaksi</a>
                                    </td>
                                    <td>
                                        {{-- <form action="{{ route('pendaftaran.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">hapus</button>
                                        </form> --}}
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
<script src="{{ asset('assets/js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('ass')}}"></script>
<script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.js')}}"></script>>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>

@endsection
