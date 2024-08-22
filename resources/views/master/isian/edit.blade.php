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
                     form Tambah category
                     {{-- <a href="" class="btn btn-outline-danger">form Tambah category</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{URL::route('employee.add')}}" class="btn btn-success">Tambah</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">form Tambah category</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('coba.update', $pemeriksaan[0]->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                               <div class="form-group">
                                    <label for="">periksa_id</label>
                                    <input class="form-control" type="text" name="periksa_id" value="{{ $pemeriksaan[0]->periksa_id }} " @readonly(true)>
                                </div>
                                
                                <div class="form-group">
                                     <label for="">periksa_id</label>
                                     <input class="form-control" type="text" name="nama_pemeriksaan" value="{{ $pemeriksaan[0]->nama_pemeriksaan }} " @readonly(true)>
                                 </div>
                                
                                
                                <div class="form-group">
                                    <label for="">descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="" cols="30" rows="10" @readonly(true)>{{ $pemeriksaan[0]->descripcion }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">kategori_isian</label>
                                    <input class="form-control" type="hidden" name="id" value="{{ $pemeriksaan[0]->id }}">
                                    <input class="form-control" type="text" name="kategori_isian" value="{{ $pemeriksaan[0]->kategori_isian }}">
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
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
@endsection
