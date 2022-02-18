@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Category')
@section('nav', 'Data Category')
@section('headerURL', 'category-admin')

@section('headerContent')
<div class="col-lg-6 col-5 text-right">
    <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-form">Create Category</button>
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" action="{{ url('category-admin/store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                                        </div>
                                        <input name="category" class="form-control" placeholder="Write Category" type="text">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-2">Add Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<!-- Page plugins -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">
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
                    <h3 class="mb-0">Data Category</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Category</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Category</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td>
                                    {{ $item->category }}
                                </td>
                                <td class="col-2">
                                    <a href="#" class="table-action btn-edit table-action-edit" data-toggle="tooltip" data-original-title="Edit category" data-id="{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="table-action btn-delete table-action-delete" data-id="{{ $item->id }}" data-toggle="tooltip" data-original-title="Delete category">
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
    
    {{-- MODAL EDIT --}}
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update-simpan" method="POST">
                    @csrf
                    <div class="modal-body modal-edit-body p-0">
                        
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-5">Edit Category</button>
                    </div>
                </form>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    $('.btn-edit').on('click', function(){
        let id = $(this).data('id')
        var action = "/category-admin-update/"+id
        console.log(id)
        $.ajax({
            url: `/category-admin/${id}/edit`,
            method: "GET",
            success: function(data){
                $('#modal-edit').find('.modal-edit-body').html(data)
                $('#modal-edit').modal('show')
                $('#form-update-simpan').attr('action', action)
            },
            error: function(error){
                console.log(error)
            },
        })
    })
    $('.btn-delete').on('click', function(){
        let id = $(this).data('id')
        var action = "/category-admin/delete/"+id
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

@endsection