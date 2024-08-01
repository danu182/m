@extends('layout.index')

@section('content')


<div class="container">
<form action="{{ route('paket.paketdetail.store',$paket->id) }}" method="POST">
    @csrf
    
    <div class="col col-lg">
    
    <div class="card-deck ">
        @forelse ($pemeriksaan as $item)
        <div class=" col-md-6 col col-lg-4 col-sm-12 mb-4">
            <div class="card shadow  mb-2">
                <!-- Card Header - Accordion -->
                <a href="#{{ $item->id }}" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h5 class="m-0 font-weight-bold text-primary">{{ $item['getPemeriksaan']->name_pemeriksaan }}</h5>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="{{ $item->id }}">
                    <div class="card-body">
                            {{-- <h6><strong>{{ $item->name }}</strong></h6> --}}
                                <ul>
                                    <input type="checkbox" name="barang_id[]" id="" value="{{ $item->id }}"> {{ $item->name_pemeriksaan }}
                                </ul>
                        
                    </div>
                </div>
            </div>
        </div>
        @empty
        <h1>tidak ada barang</h1>
        @endforelse

    </div>


{{-- </div> --}}
<button class=" btn btn-primary">simpan</button>
</form>
</div>      

</div>

    
@endsection