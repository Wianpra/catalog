@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Banner Management')
@section('nav', 'Data Banner')
@section('headerURL', 'index-banner')

@section('css')
<!-- Page plugins -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.core.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">List Product Knowledges</h3>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCreateBanner">Create Banner</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-flush" id="tablep-knowledge">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a type="button" class="btn btn-sm btn-neutral" onclick="viewImage({{$item->id}})">View Images</a></td>
                            <td>
                                <a href="{{url('edit-banner/'.$item->id)}}" class="table-action table-action-edit" data-toggle="tooltip" data-original-title="Edit Product Knowledge">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#!" class="table-action table-action-delete btn-delete-product" data-toggle="tooltip" data-original-title="Delete Product Knowledge" onclick="deleteBanner({{$item->id}})">
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
<input type="hidden" name="hiddenImg" id="hiddenImg">
@endsection

@section('modal')
<div class="modal fade" id="modalCreateBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" id="storeBanner">
                    <label for="title">Images</label>
                    <div class="dz-default dropzone" id="dropzone">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="btn btn-primary" class="btn btn-primary" id="save-banner">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalViewImg" tabindex="-1" role="dialog" aria-labelledby="modalViewImg" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="data-image" class="text-center">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDeleteBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Delete Data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a id="deleteBanner">
                    <button type="button" class="btn btn-primary">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.js"></script>
<script src="{{asset('assets/_admin/assets/vendor/select2/dist/js/select2.min.js')}}"></script>
<script src="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.min.js"></script>

<script>
    Dropzone.options.dropzone =
    {
        url: '{{route('store-gambar')}}',
        maxFiles: 1, 
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
            $('#storeBanner').append('<input type="hidden" name="imgs[]" value="' + response.name + '">')
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
            $('#storeBanner').find('input[name="imgs[]"][value="' + file.upload.filename + '"]').remove()
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
    };
</script>
<script>
    $('#save-banner').on('click', function() { 
        var gambar = $("input[name='imgs[]']").map(function(){return $(this).val();}).get();
        $.ajax({
            type: 'POST',
            url: "{{url('store-banner')}}",
            data: {imgs: gambar},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('index-banner')}}")
            }
        });
    })
    
    function deleteBanner(id) {
        $('#deleteBanner').attr('href', 'delete-banner/'+id)
        $('#modalDeleteBanner').modal('show')
    }
    
    function viewImage(id) {
        $.ajax({
            type: 'GET',
            url: "{{url('get-banner-img')}}"+ '/' + id,
            beforeSend: function() {
                $('#data-image').html('')
            },
            success: function(data){
                if (data.length == undefined) {
                    $('#data-image').append(`< No Image >`)
                } else {
                    $('#data-image').append(`<img class="d-block w-100" src="{{asset('images/${data}')}}">`)
                }
                
                $('#modalViewImg').modal('show')
            }
        });
    }
</script>
@endsection