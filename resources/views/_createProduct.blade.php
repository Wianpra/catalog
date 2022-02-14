@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Product')
@section('nav', 'Create Product')

@section('css')
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.core.css">
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Create Product</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ url('/product-admin/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Input groups with icon -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlname1">Name Product</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" name="name" placeholder="Name" id="exampleFormControlname1" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-control-label" for="exampleFormControlselect1">Category</label>
                        <select id="exampleFormControlselect1" class="form-control" name="category" data-toggle="select">
                            <option value="">- - Choose Caegory - -</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter Description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">File Upload</label>
                            <!-- Multiple -->
                            <div class="dropzone dropzone-multiple" data-toggle="dropzone" data-dropzone-multiple data-dropzone-url="http://">
                                <div class="fallback">
                                    <div class="custom-file">
                                        <input name="img[]" type="file" class="custom-file-input" id="customFileUploadMultiple" multiple>
                                        <label class="custom-file-label" for="customFileUploadMultiple">Choose file</label>
                                    </div>
                                </div>
                                <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <img class="avatar-img rounded" src="..." alt="..." data-dz-thumbnail>
                                                </div>
                                            </div>
                                            <div class="col ml--3">
                                                <h4 class="mb-1" data-dz-name>...</h4>
                                                <p class="small text-muted mb-0" data-dz-size>...</p>
                                            </div>
                                            <div class="col-auto">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item" data-dz-remove>
                                                            Remove
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-2">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection
        
        @section('script')
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/js/select2.min.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/nouislider/distribute/nouislider.min.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.min.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/dropzone/dist/dropzone.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        @endsection