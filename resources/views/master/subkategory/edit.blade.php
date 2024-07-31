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
                     form edit SubCategory
                     {{-- <a href="" class="btn btn-outline-danger">form edit SubCategory</a> --}}
                </div>
                <div class="text-right">
                    {{-- <a href="{{URL::route('employee.add')}}" class="btn btn-success">edit</a> --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">form edit SubCategory</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('subCategory.update',$subCategory[0]->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="">nama_subcategory</label>
                                    <input class="form-control" type="text"  name="nama_subcategory" value="{{ $subCategory[0]->nama_subcategory }}">
                                </div>

                                <div class="form-group">
                                    <label for="">category_id</label>
                                    <select class="form-control" name="category_id" id="">
                                        {{-- <option value="{{ $subCategory[0]->category_id }}">{{ $subCategory[0]->category->nama_category }}</option> --}}
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_category }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">descrition</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $subCategory[0]->description }}</textarea>
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
