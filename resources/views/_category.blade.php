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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                                        <input name="main_category" class="form-control" placeholder="Write Category" type="text" onkeydown="return event.key != 'Enter';">
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
                                <th  class="col-1">No</th>
                                <th>Main Category</th>
                                <th>Sub Category</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="col-1">No</th>
                                <th>Main Category</th>
                                <th>Sub Category</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($category as $item)
                            <tr>
                                <td class="col-1">{{ ++$no }}</td>
                                <td>
                                    {{ $item->main_category }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-neutral" onclick="subCategory({{$item->id}})">View Sub Category</button>
                                </td>
                                <td class="col-2">
                                    <a href="#" class="table-action table-action-edit" onclick="editMain({{$item->id}})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="table-action table-action-delete" onclick="deleteMain({{$item->id}})">
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
    
    {{-- MODAL EDIT SUB CATEGORY --}}
    <div class="modal fade" id="modal-edit-sub" tabindex="-1" role="dialog" aria-labelledby="modal-edit-sub" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-update-simpan" method="POST">
                    @csrf
                    <div class="modal-body modal-edit-body p-0">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="input-group mr-0 col-8">
                                        <input name="sub_category" id="sub-edit-value" class="form-control" type="text" onkeydown="return event.key != 'Enter';">
                                    </div>
                                    <button type="button" id="btn-save-edit-sub" class="btn btn-primary col-3 ml-2">Save</button>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- MODAL VIEW --}}
    <div class="modal fade" id="modal-show-sub" tabindex="-1" role="dialog" aria-labelledby="modal-show-sub" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sub Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-edit-body-sub p-0">
                    <div class="card-body">
                        <div class="form-group">
                            <form id="form-update-simpan-sub" method="POST">
                                <div class="row">
                                    <div class="input-group mr-0 col-8">
                                        <input name="sub_category" id="valueSub" class="form-control form-control-sm" placeholder="Add Sub Category" type="text" onkeydown="return event.key != 'Enter';">
                                    </div>
                                    <button type="button" id="btn-save-add-sub" class="btn btn-sm btn-primary col-3 ml-2">Save</button>
                                </div>
                            </form>
                        </div>
                        <table class="table" id="table-data-sub">
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL VIEW MAIN--}}
    <div class="modal fade" id="modal-show-main" tabindex="-1" role="dialog" aria-labelledby="modal-show-main" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Main Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-edit-body-sub p-0">
                    <div class="card-body">
                        <div class="form-group">
                            <form id="form-update-simpan-main" method="POST">
                                <div class="row">
                                    <div class="input-group mr-0 col-8">
                                        <input name="main_category" id="main-edit-value" class="form-control" type="text" onkeydown="return event.key != 'Enter';">
                                    </div>
                                    <button type="button" id="btn-save-edit-main" class="btn btn-primary col-3 ml-2">Save</button>
                                </div>
                            </form>
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
    function subCategory(id) {
        $.ajax({
            url: `/category-admin-sub-edit/${id}`,
            method: "GET",
            beforeSend: function() {
                $('#table-data-sub').html('')
            },
            success: function(data){
                let no = 0
                data[0].forEach(function (item, index) {
                    if (index == 0) {
                        $('#table-data-sub').append(`
                        <tr>
                            <td class="col-1"> ${++no}. </td>
                            <td> ${item.category} </td>
                            <td class="col-2">
                                <a href="#" class="table-action table-action-edit" onclick="editSub(${item.id})">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="table-action table-action-delete" onclick="deleteSub(${item.id})">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        `)
                    } else {
                        $('#table-data-sub').append(`
                        <tr>
                            <td class="col-1"> ${++no}. </td>
                            <td> ${item.category} </td>
                            <td class="col-2">
                                <a href="#" class="table-action table-action-edit" onclick="editSub(${item.id})">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="table-action table-action-delete" onclick="deleteSub(${item.id})">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        `)
                    }
                })
                $('#modal-show-sub').modal('show')
                $('#btn-save-add-sub').attr('onClick', 'addSub(' + id + ')')
            },
            error: function(error){
                console.log(error)
            },
        })
    }
    function addSub(id) {
        var valSub = $('#valueSub').val();
        $.ajax({
            type: 'POST',
            url: '{{ url('/save-sub-category/store') }}' + '/' + id,
            data: {category: valSub, main_category: id},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('/category-admin')}}")
            }
        });
    }
    function editSub(id) {
        $.ajax({
            url: '{{ url('/sub-category/edit') }}' + '/' + id,
            type: 'GET',
            success: function(data) {
                $('#modal-show-sub').modal('hide')
                $('#modal-edit-sub').modal('show')
                $('#sub-edit-value').val(data.category)
                $('#btn-save-edit-sub').attr('onClick', 'updateSub(' + id + ')')
            }
        })
    }
    function updateSub(id) {
        var valSubEdit = $('#sub-edit-value').val();
        $.ajax({
            type: 'POST',
            url: '{{ url('/save-sub-category/update') }}' + '/' + id,
            data: {category: valSubEdit},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('/category-admin')}}")
            }
        });
    }
    function deleteSub(id) {
        var action = "/sub-category/delete/"+id
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
    }
    function editMain(id) {
        $.ajax({
            url: '{{ url('/main-category/edit') }}' + '/' + id,
            type: 'GET',
            success: function(data) {
                $('#modal-show-main').modal('show')
                $('#main-edit-value').val(data.main_category)
                $('#btn-save-edit-main').attr('onClick', 'updateMain(' + id + ')')
            }
        })
    }
    function updateMain(id) {
        var valMainEdit = $('#main-edit-value').val();
        $.ajax({
            type: 'POST',
            url: '{{ url('/save-main-category/update') }}' + '/' + id,
            data: {main_category: valMainEdit},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('/category-admin')}}")
            }
        });
    }
</script>

@endsection