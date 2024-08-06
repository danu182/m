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
                     category pemeriksaan
                     {{-- <a href="" class="btn btn-outline-danger">Tambah category</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{route('category.create')}}" class="btn btn-success">Tambah</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            {{-- <h6 class="m-0 font-weight-bold text-primary">nilai dari pmereiksaan {{ $nilai->nama_pemeriksaan }}</h6> --}}
                            <a href="{{ route('tambah_nilai',$id) }}" class="btn btn-info">tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">nama_pemeriksaan</th>
                                        <th scope="col">jenis_kelamina</th>
                                        <th scope="col">nilai bawah</th>
                                        <th scope="col">nilai atas</th>
                                        <th scope="col">satuan</th>
                                        <th scope="col">created_at</th>
                                        <th scope="col">created_at</th>
                                        <th scope="col">aksi</th>
                                        <th scope="col">hapsu</th>
  
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">nama_pemeriksaan</th>
                                        <th scope="col">jenis_kelamina</th>
                                        <th scope="col">nilai bawah</th>
                                        <th scope="col">nilai atas</th>
                                        <th scope="col">satuan</th>
                                        <th scope="col">created_at</th>
                                        <th scope="col">created_at</th>
                                        <th scope="col">aksi</th>
                                        <th scope="col">hapsu</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                           @forelse ($pemeriksaan as $item)
                                            <tr>
                                                {{-- <td>dasd</td> --}}
                                                <td>{{ $item->nilai_id }}</td>
                                                <td>{{ $item->nama_pemeriksaan }}</td>
                                                <td>{{ $item->jenis_kelamina }}</td>
                                                <td>{{ $item->nilai_bawah }}</td>
                                                <td>{{ $item->nilai_atas }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                {{-- <td>{{ $item-> }}</td> --}}
                                                <td>    
                                                    <a href="{{ route('tambah_nilai', $item->id) }}" class="btn btn-warning">Tmabh nilai</a>
                                                </td>
                                                <td>    
                                                    <form action="{{ route('hapus_nilai', $item->nilai_id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">hapus</button>
                                                    </form>                                                </td>
                                                                                                       
                                                </tr>
                                               
                                           @empty
                                               <h2>tidak ad</h2>
                                           @endforelse 
                                              
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
<script src="{{ asset('assets/js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('ass')}}"></script>
<script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.js')}}"></script>>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>

@endsection
