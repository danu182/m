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
                     form edit peserta
                     {{-- <a href="" class="btn btn-outline-danger">form edit peserta</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{URL::route('employee.add')}}" class="btn btn-success">edit</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">form edit peserta</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('peserta.update', $peserta[0]->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">nomor_peserta</label>
                                    <input class="form-control" type="text" name="nomor_peserta" value="{{ $peserta[0]->nomor_peserta }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nama_peserta</label>
                                    <input class="form-control" type="text" name="nama_peserta" value="{{ $peserta[0]->nama_peserta }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">category_id</label>
                                    <select class="form-control" name="sex" id="">
                                        <option value="{{ $peserta[0]->getSex->id }}">{{ $peserta[0]->getSex->jenis_kelamina }}</option>
                                        @foreach ($sex as $item)
                                            <option value="{{ $item->id }}">{{ $item->jenis_kelamina }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">tempat_lahir</label>
                                    <input class="form-control" type="text" name="tempat_lahir" value="{{ $peserta[0]->tempat_lahir }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">tgl_lahir</label>
                                    <input class="form-control" type="date" name="tgl_lahir" value="{{ $peserta[0]->tgl_lahir }}">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">alamat</label>
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $peserta[0]->alamat }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">ktp_peserta</label>
                                    <input class="form-control" type="text" name="ktp_peserta" value="{{ $peserta[0]->ktp_peserta }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">tlp_peserta</label>
                                    <input class="form-control" type="text" name="tlp_peserta" value="{{ $peserta[0]->tlp_peserta }}">
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
