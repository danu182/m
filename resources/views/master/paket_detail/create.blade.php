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
                     paket pemeriksaan
                     {{-- <a href="" class="btn btn-outline-danger">Tambah paket</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{route('paket.paketdetail.store', $paket->id)}}" class="btn btn-success">Tambah</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">list yang belum ada di dalam {{ $paket->nama_paket }}</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('paket.paketdetail.store',$paket->id) }}" method="post">
                                @csrf
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th scope="col">id</th>
                                          <th scope="col">pilih</th>
                                          <th scope="col">nama_pemeriksaan</th>
                                          <th scope="col">nama_subcategory</th>
                                          <th scope="col">nama_category</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th scope="col">id</th>
                                          <th scope="col">pilih</th>
                                          <th scope="col">nama_pemeriksaan</th>
                                          <th scope="col">nama_subcategory</th>
                                          <th scope="col">nama_category</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                           @foreach ($pemeriksaan as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td><input class="form-control" type="checkbox" name="paket_id[]" value="{{ $item->id }}"></td>
                                                <td>{{ $item->nama_pemeriksaan }}</td>
                                                <td>{{ $item->nama_subcategory }}</td>
                                                <td>{{ $item->nama_category }}</td>                                                                                                                        
                                              </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-primary">simpan</button>
                        </form>
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
