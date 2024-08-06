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
                     form Tambah pemeriksaan
                     {{-- <a href="" class="btn btn-outline-danger">form Tambah pemeriksaan</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{URL::route('employee.add')}}" class="btn btn-success">Tambah</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">form Tambah pemeriksaan</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('simpan_nilai') }}" method="POST">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="">id pemeriksaan</label>
                                    <input class="form-control" type="text" value="{{ $pemeriksaan[0]->id }}" name="pemeriksaan_id">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nama pemeriksaan</label>
                                    <input class="form-control" type="text" value="{{ $pemeriksaan[0]->nama_pemeriksaan }}" name="nama_pemeriksaan">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">jenis Kelamin</label>
                                    <select class="form-control" name="sex" id="exampleFormControlSelect1">
                                        @foreach ($sex as $item)
                                            <option value="{{ $item->id }}">{{ $item->jenis_kelamina }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nilai bawah</label>
                                    <input class="form-control" type="text" name="nilai_bawah">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nilai atas</label>
                                    <input class="form-control" type="text" name="nilai_atas">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">satuan</label>
                                    <input class="form-control" type="text" name="satuan">
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
