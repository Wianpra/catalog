@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Product')
@section('nav', 'Data Product')

@section('headerContent')
<div class="col-lg-6 col-5 text-right">
    <a href="{{ url('/product-admin/create') }}" class="btn btn-sm btn-neutral">Create Product</a>
</div>
@endsection

@section('css')
<!-- Page plugins -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    <!-- Table -->
    <div class="row">
        <div class="col">
            
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Data Product</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Product</th>
                                <th>Images</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Seen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Product</th>
                                <th>Images</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Seen</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a type="button" class="btn btn-sm btn-neutral" data-id="" data-toggle="modal" data-target="#view-img">View Images</a>
                                    {{-- @if ($item->img == null)
                                        < No Image >
                                        @else
                                        @php
                                        $img = unserialize($item->img);
                                        $count = count($img);
                                        @endphp
                                        @for ($i = 0; $i < $count; $i++)
                                        <img src="{{ asset('images/'.$img[$i]) }}" alt="" class="img-responsive img-rounded img-thumbnail" width="75px" height="75px" >
                                        @endfor
                                        @endif --}}
                                    </td>
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
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <i class="fas fa-eye"></i>
                                        @if ($item->seen == null)
                                        0
                                        @else
                                        {{ $item->seen }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('product-admin/edit') }}/{{ $item->id }}" class="table-action table-action-edit" data-toggle="tooltip" data-original-title="Edit product">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#!" class="table-action table-action-delete btn-delete-product" data-toggle="tooltip" data-original-title="Delete product" data-id="{{ $item->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center text-lg-left text-muted">
                        &copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <div class="modal fade" id="set-category" tabindex="-1" role="dialog" aria-labelledby="set-category" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update-category" role="form" method="post">
                    @csrf
                    <div class="modal-body p-0">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-body mb-0">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <select id="exampleFormControlselect1" class="form-control" name="category" data-toggle="select">
                                            <option value="">- - Choose Caegory - -</option>
                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-primary my-2">Set Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    
    @section('script')
    <script>
        $('.edit-category-product').on('click', function(){
            let id = $(this).data('id')
            var action = "/edit-category-product/"+id
            $('#modal-edit').modal('show')
            $('#form-update-category').attr('action', action)
        })
        
        $('.btn-delete-product').on('click', function(){
            let id = $(this).data('id')
            var action = "/product-admin-delete/"+id
            Swal.fire({
                title: 'Warning!',
                icon: 'info',
                html: 'Are you sure you want to delete the data? <br> NB : deleted data cannot be recovered',
                showCancelButton: true,
                showDenyButton: true,
                showConfirmButton: false,
                denyButtonText: 'Delete',
            }).then((result) => {
                if (result.isDenied) {
                    window.location.href = action
                }
            })
        })
    </script>
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