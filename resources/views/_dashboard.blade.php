@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Dashboard')
@section('nav', 'Dashboard')


@section('css')
<!-- Page plugins -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.core.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> --}}
@endsection

@section('content')

<div class="container-fluid mt--6">
    <!-- Card stats -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body py-4">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Main Category</h5>
                            <span class="h2 font-weight-bold mb-0">{{$count_c}} main category</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-ungroup"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body py-4">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total sub Category</h5>
                            <span class="h2 font-weight-bold mb-0">{{$count_s}} sub category</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-bag-17"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body py-4">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Product</h5>
                            <span class="h2 font-weight-bold mb-0">{{$count_p}} product</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-archive-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body py-4">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total view</h5>
                            <span class="h2 font-weight-bold mb-0">{{$seen}} view</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="fa fa-eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-4">List Product</h3>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab-mainCategory" data-toggle="pill" data-target="#mainCategory" type="button" role="tab" aria-controls="mainCategory" aria-selected="true">Main Category</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-subCategory" data-toggle="pill" data-target="#subCategory" type="button" role="tab" aria-controls="subCategory" aria-selected="false">Sub Category</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-product" data-toggle="pill" data-target="#product" type="button" role="tab" aria-controls="product" aria-selected="false">Product</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane active" id="mainCategory" role="tabpanel" aria-labelledby="tab-product">
                        <div class="container">
                            <div class="row mt-5">
                                @foreach ($main as $item)
                                    @php
                                        $seen = App\Product::join('categories', 'categories.id', '=', 'products.category')->where('categories.main_category', $item->id)->sum('products.seen');
                                    @endphp
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-stats">
                                            <!-- Card body -->
                                            <div class="card-body py-4">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="card-title text-uppercase text-muted mb-0">Total View <br>{{$item->main_category}}</h5>
                                                        <span class="h2 font-weight-bold mb-0">{{$seen}} View</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                            <i class="fa fa-eye"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="subCategory" role="tabpanel" aria-labelledby="tab-subCategory">
                        <div class="container">
                            <div class="row mt-5">
                                @foreach ($sub as $item)
                                    @php
                                        $seen = App\Product::where('category', $item->id)->sum('seen');
                                    @endphp
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-stats">
                                            <!-- Card body -->
                                            <div class="card-body py-4">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="card-title text-uppercase text-muted mb-0">Total View <br>{{$item->category}}</h5>
                                                        <span class="h2 font-weight-bold mb-0">{{$seen}} View</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                            <i class="fa fa-eye"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="product" role="tabpanel" aria-labelledby="tab-product">
                        <div class="table-responsive py-4">
                            <table class="table table-flush" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Seen</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Seen</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                    $no = 0;
                                    @endphp
                                    @foreach ($product as $item)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if ( $item->category == null)
                                            <a type="button" class="btn btn-sm btn-neutral edit-category-product" data-id="{{$item->id}}" data-toggle="modal" data-target="#set-category">Set Category</a>
                                            @else
                                            @foreach ($category as $data)
                                            @if($item->category == $data->id)
                                            {{ $data->category }}
                                            @endif
                                            @endforeach
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <i class="fas fa-eye"></i>
                                            @if ($item->seen == null)
                                            0
                                            @else
                                            {{ $item->seen }}
                                            @endif
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
    <!-- Footer -->
    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center text-lg-left text-muted">
                    &copy; 2022 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Lunarian</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

@endsection

@section('script')

<script src="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/js/select2.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
@endsection