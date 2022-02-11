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
            <form>
                <!-- Input groups with icon -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <input class="form-control" placeholder="Name" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" data-toggle="select">
                            <option>- - Choose Caegory - -</option>
                            <option>Badges</option>
                            <option>Buttons</option>
                            <option>Cards</option>
                            <option>Forms</option>
                            <option>Modals</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div data-toggle="quill" data-quill-placeholder="Write Description">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <!-- Multiple -->
                            <div class="dropzone dropzone-multiple" data-toggle="dropzone" data-dropzone-multiple data-dropzone-url="http://">
                                <div class="fallback">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFileUploadMultiple" multiple>
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
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        
        <script src="{{ asset('/') }}assets/_admin/assets/js/argon.js?v=1.1.0"></script>
        <div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div>
        <input type="file" class="dz-hidden-input" accept="image/*" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
        <input type="file" multiple="multiple" class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
        <div style="left: -1000px; overflow: scroll; position: absolute; top: -1000px; border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;">
            <div style="border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"></div>
        </div>
        @endsection