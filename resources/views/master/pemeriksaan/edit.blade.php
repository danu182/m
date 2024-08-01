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
                     form edit pemeeriksaan
                     {{-- <a href="" class="btn btn-outline-danger">form edit pemeeriksaan</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{URL::route('employee.add')}}" class="btn btn-success">edit</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">form edit Pemeriksaan -->{{ $subCategory->nama_subcategory }} --> {{ $pemeriksaan->nama_pemeriksaan }}</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('subCategory.pemeriksaan.update', [$pemeriksaan->subcategory_id, $pemeriksaan->id]) }}" method="POST">
                                @csrf
                                @method("PUT")
                                {{-- <div class="form-group">
                                    <label for="">Pemeriksaan</label>
                                    <select name="sub_pemeeriksaan_id" id="">
                                        @foreach ($subpemeeriksaan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_sub_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="form-group">
                                    <label for="">nama_pemeriksaan</label>
                                    <input type class="form-control" type="text" name="nama_pemeriksaan" value="{{ $pemeriksaan->nama_pemeriksaan }}">
                                </div>
                                
                                {{-- <div class="form-group">
                                    <label for="">subcategory_id</label>
                                    <input type class="form-control" type="text" name="subcategory_id">
                                </div> --}}
                                
                                <div class="form-group">
                                    <label for="">descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="" cols="30" rows="10">{{ $pemeriksaan->descripcion }}</textarea>
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
