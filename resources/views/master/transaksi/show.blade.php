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
                     form Tambah paket
                     {{-- <a href="" class="btn btn-outline-danger">form Tambah paket</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{URL::route('employee.add')}}" class="btn btn-success">Tambah</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">form Tambah paket</h6>
                        </div>
                        <div class="card-body">
                           <h5>keterangan pendaftaran</h5>
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="contoh1">nama_peserta</label>
                                            <input type="text" class="form-control" id="contoh1" placeholder="Nama" value="{{ $pendaftaran->getPeserta->nama_peserta }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="contoh2">nomor_peserta</label>
                                            <input type="text" class="form-control" id="contoh2" placeholder="Username" value="{{ $pendaftaran->getPeserta->nomor_peserta }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="contoh2">tempat_lahir</label>
                                            <input type="text" class="form-control" id="contoh2" placeholder="Username" value="{{ $pendaftaran->getPeserta->tempat_lahir }}"readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="contoh2">ktp_peserta</label>
                                            <input type="text" class="form-control" id="contoh2" placeholder="Username" value="{{ $pendaftaran->getPeserta->ktp_peserta }}"readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="contoh2">tlp_peserta</label>
                                            <input type="text" class="form-control" id="contoh2" placeholder="Username" value="{{ $pendaftaran->getPeserta->tlp_peserta }}"readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="contoh2">status</label>
                                            <input type="text" class="form-control" id="contoh2" placeholder="Username" value="{{ $pendaftaran->getPeserta->status }}"readonly>
                                        </div>
                                    </div>
                                
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="contoh1">tgl_pendaftaran</label>
                                            <input type="text" class="form-control" id="contoh1" value="{{ $pendaftaran->tgl_pendaftaran }} " readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="contoh2">no_pendaftaran</label>
                                            <input type="text" class="form-control" id="contoh2" value="{{ $pendaftaran->no_pendaftaran }} " readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="contoh2">Alamat Ayah</label>
                                            <input type="text" class="form-control" id="contoh2" value="{{ $pendaftaran->getPaket->nama_paket }} " readonly>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-row">
                                    @forelse ($transaksi as $item)
                                        <div class="form-group col-md-6">
                                            
                                            <label for="contoh1">{{ $item->getPemeriksaan->nama_pemeriksaan }}</label>
                                            <input type="text" class="form-control col-md-3 " id="contoh1" name="{{ $item->getPemeriksaan->nama_pemeriksaan }}" >
                                        </div>
                                        
                                        @empty
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <h3>tidak ada isi</h3>
                                            </div>
                                            @endforelse
                                        </div>
                                
                                    <button type="submit" class="btn btn-primary">Tombol</button>
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
