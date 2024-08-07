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
                     form Tambah perusahaan
                     {{-- <a href="" class="btn btn-outline-danger">form Tambah perusahaan</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{URL::route('employee.add')}}" class="btn btn-success">Tambah</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">form Tambah perusahaan</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('perusahaan.store') }}" method="POST">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="">nama perusahaan</label>
                                    <input class="form-control" type="text" name="nama_perusahaan">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">alamat_perusahaan</label>
                                    <textarea class="form-control" name="alamat_perusahaan" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">tlp_perusahaan</label>
                                    <input class="form-control" type="text" name="tlp_perusahaan">
                                </div>

                                <div class="form-group">
                                    <label for="">cp_perusahaan</label>
                                    <input class="form-control" type="text" name="cp_perusahaan">
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
