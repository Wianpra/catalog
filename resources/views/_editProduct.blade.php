@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Product')
@section('nav', 'Edit Product')
@section('headerURL', 'product-admin')

@section('css')
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.core.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css">
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Edit Product</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
                
                <!-- Input groups with icon -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlname1">Name Product</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" name="name" value="{{ $product->name }}" id="exampleFormControlname1" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-control-label" for="exampleFormControlselect1">Category</label>
                        <select id="exampleFormControlselect1" class="form-control" name="category" data-toggle="select">
                            <option value="">- - Choose Caegory - -</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}" @if ($product->category == $item->id)selected @endif>{{ $item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlTextarea1">Description</label>
                            {{-- <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $product->description }}</textarea> --}}
                            <div data-toggle="quill" data-quill-placeholder="Quill WYSIWYG" id="quill-description"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-control-label">Image</label>
                        <table class="table">
                            @if ($product->img == null)
                            < No Image >
                            @else
                            @php
                            $img = unserialize($product->img);
                            $count = count($img);
                            @endphp
                            @for ($i = 0; $i < $count; $i++)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/'.$img[$i])}}" alt="" class="img-responsive img-rounded img-thumbnail" width="200px" height="200px">
                                </td>
                                <td>
                                    <a href="#!" class="table-action table-action-delete btn-delete-product" data-toggle="tooltip" data-original-title="Delete product" onclick="deleteGambar({{$product->id}}, {{$i}})">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <input type="hidden" name="imgs[]" value="{{ $img[$i] }}">
                            @endfor
                            @endif
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">File Upload</label>
                            <div class="needsclick dropzone" id="dropzone">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="updateProduk({{$product->id}})" class="btn btn-primary my-2">Add Product</button>
                        </div>
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
                    console.log(response)
                    $('#updateProduct').append('<input type="hidden" name="imgs[]" value="' + response.name + '">')
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
                            console.log('success: ' + response)
                        }
                    });
                    $('#updateProduct').find('input[name="imgs[]"][value="' + file.upload.filename + '"]').remove()
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
            };

            function updateProduk(id) {
                var productName = $('#exampleFormControlname1').val();
                var productCategory = $('#exampleFormControlselect1').val();
                var gambar = $("input[name='imgs[]']").map(function(){return $(this).val();}).get();
                var productDescription = $('#quill-description > .ql-editor').html();
                $.ajax({
                    type: 'POST',
                    url: '{{ url('/product-admin/update') }}' + '/' + id,
                    data: {name: productName, category: productCategory, description: productDescription, imgs: gambar},
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(data){
                        location.replace("{{ url('/product-admin')}}")
                    }
                });
            }
            
            function deleteGambar(id, name) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('delete-gambar')}}" + '/' + id,
                    data: {name: name},
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(response){
                        console.log('success: ' + response)
                        location.reload()
                    }
                });
            }
        </script>
        
        @endsection