@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Dashboard')
@section('nav', 'Dashboard')
@section('content')
<div class="container-fluid mt--6">
    <div class="row mb-5">
        <div class="col-3 mb-3">
            <button class="btn btn-secondary col-12 active btnmain" onclick="semua()" type="button">All Main Category</button>
        </div>            
        @foreach ($main as $main)
        <div class="col-3 mb-3">
            <button class="btn btn-secondary col-12" id="btnsub{{$main->id}}" onclick="btn({{$main->id}})" type="button">{{$main->main_category}}</button>
        </div>            
        @endforeach
    </div>
    <!-- Card stats -->
    <div class="row">
        @foreach ($sub as $item)
        {{-- foreach all --}}
        <div class="col-xl-3 col-md-6 sub" style="display: none;">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">{{$item->category}}</h5>
                            <span class="h2 font-weight-bold mb-0">x tersedia</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-eye"></i>&nbsp x terlihat</span>
                        <span class="text-nowrap">seen</span>
                    </p>
                </div>
            </div>
        </div>
        {{-- endforeach --}}
        @endforeach
        
        @foreach ($main2 as $items)
        {{-- foreach sub --}}
        <div class="col-xl-3 col-md-6 all" style="display: block">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">{{ $items->main_category}}</h5>
                            <span class="h2 font-weight-bold mb-0">x tersedia</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-eye"></i>&nbsp x terlihat</span>
                        <span class="text-nowrap">seen</span>
                    </p>
                </div>
            </div>
        </div>
        {{-- endforeach --}}
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script>
    function btn(id) {
        var elems = document.getElementsByClassName('all');
        var elemt = document.getElementsByClassName('sub');
        var btnmain = document.getElementsByClassName('btnmain');

        for (var i=0;i<btnmain.length;i+=1){
            btnmain[i].classList.remove("active");
        }
        for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
        }

        for (var i=0;i<elemt.length;i+=1){
            elemt[i].style.display = 'block';
        }
    }
    function semua() {
        var elems = document.getElementsByClassName('all');
        var elemt = document.getElementsByClassName('sub');
        var btnmain = document.getElementsByClassName('btnmain');
        
        for (var i=0;i<btnmain.length;i+=1){
            btnmain[i].classList.add("active");
        }

        for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'block';
        }

        for (var i=0;i<elemt.length;i+=1){
            elemt[i].style.display = 'none';
        }
    }
</script>
@endsection
