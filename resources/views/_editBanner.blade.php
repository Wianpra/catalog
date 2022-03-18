@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Banner Management')
@section('nav', 'Edit Banner')
@section('headerURL', 'index-banner')

@section('css')
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.core.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css">
@endsection

@section('content')
@php
    $img = json_encode(unserialize($data->img));
@endphp
<div class="container-fluid mt--6">
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Edit Product</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
                <!-- Input groups with icon -->
                <div class="row" id="updateProduct">
                    <div class="form-group col-12" id="storeKnowledge">
                        <label for="title">Images</label>
                        <div class="dz-default dropzone" id="dropzone">
                                
                        </div>
                    </div>
                    <div class="form-group text-center col-12">
                        <button type="button" onclick="updateBanner({{$data->id}})" class="btn btn-primary my-2">Update Banner</button>
                    </div>
                </div>
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
            $(window).on("load", function () {
                $('.dz-image img').attr('width', 125);
                $('.dz-image img').attr('height', 125);
                $('.dz-remove').addClass('mt-3 btn btn-danger btn-sm')
                // $('#jenis_stok').trigger('change')
                // $('#jenis_diskon').trigger('change')
                // console.log(gambar);
            })
            
            Dropzone.options.dropzone =
            {
                url: '{{route('store-gambar')}}',
                maxFiles: 1, 
                maxFilesize: 25,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + '_' + file.name;
                },
                init: function () {
                    var thisDropzone = this;
                    var gambar = "{{$img}}";
                    var array = JSON.parse(gambar.replace(/&quot;/g,'"')); 
                    
                    $.each(array, function (value, key) {
                        var mockFile = { name: key };
                        
                        thisDropzone.files.push(mockFile);
                        thisDropzone.emit("addedfile", mockFile);
                        thisDropzone.emit("thumbnail", mockFile, `{{asset('images')}}`+ "/" + key);
                        thisDropzone.emit("complete", mockFile);

                        $('#updateProduct').append('<input type="hidden" name="imgs[]" value="' + key + '">')
                    })

                    $('.dz-details').remove()
                    $('.dz-remove').addClass('mt-3 btn btn-danger btn-sm')
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                acceptedFiles: ".jpeg,.jpg,.png",
                addRemoveLinks: true,
                timeout: 60000,
                success: function (file, response) {
                    console.log(response)
                    $('#updateProduct').append('<input type="hidden" name="imgs[]" value="' + response.name + '">')
                    $('.dz-details').remove()
                    $('.dz-remove').addClass('mt-3 btn btn-danger btn-sm')
                },
                error: function (file, response) {
                    return false;
                },
                removedfile: function(file) {
                    var fileName = file.name; 
                    
                    $.ajax({
                        type: 'POST',
                        url: '{{route('remove-gambar')}}',
                        data: {name: fileName,request: 'delete'},
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(response){
                            console.log('success: ' + response)
                        }
                    });
                    $('#updateProduct').find('input[name="imgs[]"][value="' + file.name + '"]').remove()
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
            };

            function updateBanner(id) {
                var gambar = $("input[name='imgs[]']").map(function(){return $(this).val();}).get();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('update-banner') }}" + '/' + id,
                    data: {imgs: gambar},
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(data){
                        location.replace("{{ url('index-banner')}}")
                    }
                });
            }
        </script>
        
        @endsection