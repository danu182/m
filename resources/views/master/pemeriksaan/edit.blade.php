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
                     form edit pemeriksaan
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
                            <h6 class="m-0 font-weight-bold text-primary">form edit pemeriksaan</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pemeriksaan.update',$pemeriksaan->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <h1>asdas</h1>
                                <div class="form-group">
                                    <label for="">sub kategori pemeriksaan</label>
                                    <select name="sub_kategori" id="">
                                        {{-- <option value="{{ $pemeriksaan->id }}">{{ $pemeriksaan['relasi_sub_kategori']->nama_sub_kategori }}</option> --}}
                                        @foreach ($subkategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_sub_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">nama sub pemeriksaan</label>
                                    <input type="text" name="nama_pemeriksaan" value="{{ $pemeriksaan->nama_pemeriksaan }}">
                                </div>

                               <div class="form-group">
                                    <label for="">satuan</label>
                                    <input type="text" name="satuan" value="{{ $pemeriksaan->satuan }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nilai_bawah</label>
                                    <input type="text" name="nilai_bawah" value="{{ $pemeriksaan->nilai_bawah }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">nilai_atas</label>
                                    <input type="text" name="nilai_atas" value=" {{ $pemeriksaan->nilai_atas  }}">
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
