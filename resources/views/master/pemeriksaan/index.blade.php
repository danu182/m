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
                      pemeriksaan {{ $subCategory->nama_subcategory }}
                     {{-- <a href="" class="btn btn-outline-danger">Tambah Kategori</a> --}}
                </div>
                <div class="text-right">
                    <a href="{{route('subCategory.pemeriksaan.create',$subCategory)}}" class="btn btn-success">Tambah</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">pemeriksaan -> {{ $subCategory->nama_subcategory }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                         <th>id</th>
                                            <th>nama_pemeriksaan</th>
                                            <th>description</th>
                                            <th>edit</th>
                                            <th>hapus</th>

                                          
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>id</th>
                                            <th>nama_pemeriksaan</th>
                                            <th>description</th>
                                            <th>edit</th>
                                            <th>hapus</th>

                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                           @foreach ($pemeriksaan as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nama_pemeriksaan }}</td> 
                                                <td>{{ $item->descripcion }}</td> 
                                                {{-- <td>{{ $item->kategori_id }}</td> --}}
                                                    {{-- <td>{{ $item['Relasi_kategori']['nama_kategori'] }}</td> --}}
                                                  <td>
                                                    {{-- <a href="{{ route('subCategory.pemeriksaan.edit',[$item->subcategory_id, $subCategory->id ]) }}" class="btn btn-warning">Edit</a> --}}
                                                    <a href="{{ route('subCategory.pemeriksaan.edit',[$item->subcategory_id, $item->id ]) }}" class="btn btn-warning">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('subCategory.pemeriksaan.destroy', [$item->subcategory_id, $item->id])  }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">hapus</button>
                                                    </form>
                                                </td>                                                            
                                                        </tr>
                                              @endforeach
                                    </tbody>
                                </table>
                            </div>
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
