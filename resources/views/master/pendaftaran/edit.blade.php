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
                     form show pendaftaran
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
                            <form action="{{ route('pendaftaran.update',$pendaftaran->id) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="">nomor_pesertum</label>
                                    <input class="form-control" type="text" name="nomor_peserta" value="{{ $pendaftaran->getPeserta->nomor_peserta }} " readonly >
                                    <input type="hidden" name="peserta_id" value="{{ $pendaftaran->id }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nama_pendaftaran</label>
                                    <input class="form-control" type="text" name="nama_peserta" value="{{ $pendaftaran->getPeserta->nama_peserta }}" readonly >
                                </div>
                                
                                 <div class="form-group">
                                    <label for="">perusahaan</label>
                                    <select class="form-control" name="perusahaan_id" id="">
                                        <option value="{{ $pendaftaran->getPerusahaan->id }}">{{ $pendaftaran->getPerusahaan->nama_perusahaan }}</option>
                                        @foreach ($perusahaan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_perusahaan }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="">paket</label>
                                    <select class="form-control" name="paket_id" id="">
                                        <option value="{{ $pendaftaran->getPaket->id }}">{{ $pendaftaran->getPaket->nama_paket }}</option>
                                        @foreach ($paket as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_paket }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">category_id</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaran->getPeserta->getSex->jenis_kelamina }}" readonly >
                                </div>
                                
                                <div class="form-group">
                                    <label for="">tempat_lahir</label>
                                    <input class="form-control" type="text" name="tempat_lahir" value="{{ $pendaftaran->getPeserta->tempat_lahir }}" readonly >
                                </div>
                                
                                <div class="form-group">
                                    <label for="">tgl_lahir</label>
                                    <input class="form-control" type="date" name="tgl_lahir" value="{{ $pendaftaran->getPeserta->tgl_lahir }}" readonly >
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">alamat</label>
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" readonly >{{ $pendaftaran->getPeserta->alamat }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">ktp_pendaftaran</label>
                                    <input class="form-control" type="text" name="ktp_peserta" value="{{ $pendaftaran->getPeserta->ktp_peserta }}" readonly >
                                </div>
                                
                                <div class="form-group">
                                    <label for="">tlp_pendaftaran</label>
                                    <input class="form-control" type="text" name="tlp_peserta" value="{{ $pendaftaran->getPeserta->tlp_peserta }}" readonly >
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
