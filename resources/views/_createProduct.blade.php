@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Product')
@section('nav', 'Create Product')
@section('headerURL', 'product-admin')

@section('css')
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.core.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/basic.min.css">
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
            <form action="{{ url('/product-admin/store') }}" method="post" enctype="multipart/form-data" id="createProduct">
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
                            {{-- <textarea class="form-control" name="description" placeholder="Enter Description" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                            <input type="hidden" id="quill-html" name="description">
                            <div data-toggle="quill" data-quill-placeholder="Write Description" id="quill-description"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">File Upload</label>
                            <div class="dz-default dropzone" id="dropzone">
                                
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" id="btn-submit" class="btn btn-primary my-2">Add Product</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endsection
        
        @section('script')
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/js/select2.min.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/nouislider/distribute/nouislider.min.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.min.js"></script>
        <script src="{{ asset('/') }}assets/_admin/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.js"></script>
        <script>
            Dropzone.options.dropzone =
            {
                url: '{{route('store-gambar')}}',
                maxFiles: 5, 
                maxFilesize: 10,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + '_' + file.name;
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 60000,
                success: function (file, response) {
                    $('#createProduct').append('<input type="hidden" name="imgs[]" value="' + response.name + '">')
                    $('.dz-details').remove()
                    $('.dz-remove').addClass('mt-3 btn btn-danger btn-sm')
                },
                error: function (file, response) {
                    return false;
                },
                removedfile: function(file) {
                    var fileName = file.upload.filename; 
                    
                    $.ajax({
                        type: 'POST',
                        url: '{{route('remove-gambar')}}',
                        data: {name: fileName,request: 'delete'},
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(response){
                        }
                    });
                    $('#createProduct').find('input[name="imgs[]"][value="' + file.upload.filename + '"]').remove()
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
            };
        </script>
        <script>
            $('#btn-submit').on('click', function() { 
                var productName = $('#exampleFormControlname1').val();
                var productCategory = $('#exampleFormControlselect1').val();
                var gambar = $("input[name='imgs[]']").map(function(){return $(this).val();}).get();
                var productDescription = $('#quill-description > .ql-editor').html();
                $.ajax({
                    type: 'POST',
                    url: '{{ url('/product-admin/store') }}',
                    data: {name: productName, category: productCategory, description: productDescription, imgs: gambar},
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(data){
                        location.replace("{{ url('/product-admin')}}")
                    }
                });
            })
        </script>
        @endsection