@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Product')
@section('nav', 'Product')

@section('headerContent')
<div class="col-lg-6 col-5 text-right">
    <a href="{{ url('/product-admin/create') }}" class="btn btn-sm btn-neutral">Create Product</a>
</div>
@endsection

@section('css')
<!-- Page plugins -->
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
                            <tr>
                                <td>Kursi</td>
                                <td>*gambar</td>
                                <td>Barang</td>
                                <td>*ini deskripsi</td>
                                <td>
                                    <i class="fas fa-eye"></i>
                                    1,5k
                                </td>
                                <td>
                                    <a href="#!" class="table-action table-action-info" data-toggle="tooltip" data-original-title="Info product">
                                        <i class="fas fa-info"></i>
                                    </a>
                                    <a href="#!" class="table-action table-action-edit" data-toggle="tooltip" data-original-title="Edit product">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
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
@endsection

@section('script')
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endsection