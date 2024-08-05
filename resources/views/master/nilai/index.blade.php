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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">pemeriksaan_id</th>
                                        <th scope="col">sex</th>
                                        <th scope="col">nilai_bawah</th>
                                        <th scope="col">nilai_atas</th>
                                        <th scope="col">satuan</th>
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">pemeriksaan_id</th>
                                        <th scope="col">sex</th>
                                        <th scope="col">nilai_bawah</th>
                                        <th scope="col">nilai_atas</th>
                                        <th scope="col">satuan</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                           @forelse ($Pemeriksaan as $item)
                                            <tr>
                                                <td>dasd</td>
                                                {{-- <h3>asdasd</h3> --}}
                                                {{-- <td>{{ $item->id }}</td>
                                                <td>{{ $item->pemeriksaan_id }}</td>
                                                <td>{{ $item->sex }}</td>
                                                <td>{{ $item->nilai_bawah}}</td>
                                                <td>{{ $item->nilai_atas}}</td> --}}
                                                {{-- <td>{{ $item->slug }}</td> --}}
                                                    {{-- <td>
                                                            <a href="{{ route('nilai.create', $item->id) }}" class="btn btn-warning">Tmabh nilai</a>
                                                        </td> --}}
                                                        {{-- <td>
                                                            <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">hapus</button>
                                                            </form>
                                                        </td>                                                             --}}
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
