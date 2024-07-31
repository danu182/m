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
                     subKategori pemeriksaan
                     {{-- <a href="" class="btn btn-outline-danger">Tambah Kategori</a> --}}
                </div>
                <div class="text-right">
                    <a href="{{route('subCategory.create')}}" class="btn btn-success">Tambah</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">subKategori</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th scope="col">id</th>
                                          <th scope="col">nama_subcategori</th>
                                          <th scope="col">category</th>
                                          <th scope="col">description</th>
                                          <th scope="col">slug</th>
                                          <th scope="col">hapus</th>
                                          <th scope="col">aksi</th>
                                        
                                          
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th scope="col">id</th>
                                          <th scope="col">nama_subcategori</th>
                                          <th scope="col">category</th>
                                          <th scope="col">description</th>
                                          <th scope="col">slug</th>
                                          <th scope="col">hapus</th>
                                          <th scope="col">aksi</th>
                                        
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                           @foreach ($subCategory as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nama_subcategory }}</td>
                                                <td>{{ $item->category->nama_category }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->slug }}</td>
                                            <td>
                                        <a href="{{ route('subCategory.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        {{-- <a href="{{ route('subCategory.edit', $item->id) }}" class="bt n btn-warning">Edit</a> --}}
                                        <a href="{{ route('subCategory.pemeriksaan.index', $item->id) }}" class="btn btn-info">tambah pemeriksaan</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('subCategory.destroy', $item->id) }}" method="post">
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
