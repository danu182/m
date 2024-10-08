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
                     form Tambah Kategori
                     {{-- <a href="" class="btn btn-outline-danger">form Tambah Kategori</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{URL::route('employee.add')}}" class="btn btn-success">Tambah</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">form Tambah Pemeriksaan</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pemeriksaan.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Pemeriksaan</label>
                                    <select name="sub_kategori_id" id="">
                                        @foreach ($subkategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_sub_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nama_pemeriksaan</label>
                                    <input type="text" name="nama_pemeriksaan">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">satuan</label>
                                    <input type="text" name="satuan">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nilai_bawah</label>
                                    <input type="text" name="nilai_bawah">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nilai_atas</label>
                                    <input type="text" name="nilai_atas">
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
