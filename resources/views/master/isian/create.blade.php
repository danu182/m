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
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="">pemeriksaan_id</label>
                                    <select  class="form-control" name="pemeriksaan_id" id="">
                                        @foreach ($pemeriksaan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_pemeriksaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nama_isian</label>
                                    <input class="form-control" type="text" name="nama_isian">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">tipe_isian</label>
                                    <input class="form-control" type="text" name="tipe_isian">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">class_isian</label>
                                    <input class="form-control" type="text" name="class_isian">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">id_isian</label>
                                    <input class="form-control" type="text" name="id_isian">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">placeholder_isian</label>
                                    <input class="form-control" type="text" name="placeholder_isian">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">atribut_isian</label>
                                    <input class="form-control" type="text" name="atribut_isian">
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
