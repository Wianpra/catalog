@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Founder Management')
@section('nav', 'Data Founder Management')
@section('headerURL', 'founder-index')

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
                    <h3 class="mb-0">List Founder</h3>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCreateFounder">Create Founder</button>
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
                            <th>Name</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a type="button" class="btn btn-sm btn-neutral" onclick="viewImage({{$item->id}})">View Images</a></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->position}}</td>
                            <td>
                                <a href="{{url('edit-founder/'.$item->id)}}" class="table-action table-action-edit" data-toggle="tooltip" data-original-title="Edit Founder">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#!" class="table-action table-action-delete btn-delete-product" data-toggle="tooltip" data-original-title="Delete Founder" onclick="deleteFounder({{$item->id}})">
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
@endsection

@section('modal')
<div class="modal fade" id="modalCreateFounder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Product Knowledge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" id="storeKnowledge">
                    <label for="title">Images</label>
                    <div class="dz-default dropzone" id="dropzone">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="title">Position</label>
                    <input class="form-control" type="text" id="position" name="position">
                </div>
            </div>
            <div class="modal-footer">
                <button type="btn btn-primary" class="btn btn-primary" id="save-founder">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalViewImg" tabindex="-1" role="dialog" aria-labelledby="modalViewImg" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
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

<div class="modal fade" id="modalDeleteFounder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Data Founder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Delete Data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a id="deleteFounder">
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
    $( document ).ready(function () {
        $("#idProduct").select2()
        $.ajax({
                url: "{{url('get-product')}}",
                success: function(data){
                    data.forEach(function (item) {
                        $('#idProduct').append(`<option value="${item.id}">${item.name}</option>`)
                    });
                }
            });
    })

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
            $('#storeKnowledge').append('<input type="hidden" name="imgs[]" value="' + response.name + '">')
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
            $('#storeKnowledge').find('input[name="imgs[]"][value="' + file.upload.filename + '"]').remove()
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
    };
</script>
<script>
    $('#save-founder').on('click', function() { 
        var name = $('#name').val();
        var position = $('#position').val();
        var gambar = $("input[name='imgs[]']").map(function(){return $(this).val();}).get();
        $.ajax({
            type: 'POST',
            url: "{{url('store-founder')}}",
            data: {name: name, position: position, imgs: gambar},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('founder-index')}}")
            }
        });
    })
    
    function deleteFounder(id) {
        $('#deleteFounder').attr('href', 'delete-founder/'+id)
        $('#modalDeleteFounder').modal('show')
    }
    
    function viewImage(id) {
        $.ajax({
            type: 'GET',
            url: "{{url('get-founder-img')}}"+ '/' + id,
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
    
    function detailArticle(id) {
        $('#quill-description-edit > .ql-editor').html('')
        $.ajax({
            url: "{{url('get-knowledge')}}/" + id,
            success: function(data){
                $('#quill-description-edit > .ql-editor').html(data.article)
                $('#modalDetailArticle').modal('show')
            }
        });
    }
</script>
@endsection