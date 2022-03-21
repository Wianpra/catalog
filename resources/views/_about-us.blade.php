@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'About Us')
@section('nav', 'Data About Us')
@section('headerURL', 'about-admin')

@section('css')
<!-- Page plugins -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.core.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> --}}
@endsection

@section('content')
<div class="container-fluid mt--6">
    <!-- Table -->
    <div class="row">
        <div class="col">
            
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6 col-5">
                            <h3 class="mb-0">About Us</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="fieldEdit">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6 col-5">
                                            <h3>Data Vision & Mision</h3>
                                        </div>
                                        <div class="col-lg-6 col-5 text-right">
                                            <button type="button" onclick="editVisi({{$about->id}})" class="btn btn-sm btn-neutral">Edit Vision</button>
                                            <button type="button" onclick="editMisi({{$about->id}})" class="btn btn-sm btn-neutral">Edit Mision</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row  mb-3">
                                        <div class="col-2"></div>
                                        <div class="col-8">
                                            <h3 class="text-center">Vision</h3>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" onclick="saveVisi({{$about->id}})" style="display:none" id="btn-save-visi" class="btn btn-sm btn-primary">Save</button>
                                        </div>
                                    </div>
                                    
                                    <div id="display-quill-visi" style="display:none">
                                        <div data-toggle="quill" id="quill-visi"></div>
                                    </div>
                                    
                                    <div id="div_visi">
                                        @if ($count == "0")
                                        <div id="view-visi">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt pariatur ex id provident perspiciatis quod sapiente, error deserunt sit dolores asperiores, suscipit consequatur dicta, tenetur rerum sequi tempore assumenda minus!
                                        </div>
                                        @else
                                        <div id="view-visi">
                                            @php
                                            echo $about->visi;
                                            @endphp
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div class="row mt-5 mb-3">
                                        <div class="col-2"></div>
                                        <div class="col-8">
                                            <h3 class="text-center">Mision</h3>
                                        </div>
                                        <div class="col-2 text-right">
                                            <button type="button" onclick="saveMisi({{$about->id}})" style="display:none" id="btn-save-misi" class="btn btn-sm btn-primary">Save</button>
                                        </div>
                                    </div>
                                    
                                    <div id="display-quill-misi" style="display:none">
                                        <div data-toggle="quill" id="quill-misi"></div>
                                    </div>
                                    
                                    <div id="div_misi">
                                        @if ($count == "0")
                                        <div id="view-misi">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores ad, dolorem iure tempore architecto eum provident doloremque cumque ab quasi! Odit ea dolorem distinctio excepturi cum placeat commodi recusandae quidem?
                                        </div>
                                        @else
                                        <div id="view-misi">
                                            @php
                                            echo $about->misi;
                                            @endphp
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6 col-5">
                                            <h3>Data History</h3>
                                        </div>
                                        <div class="col-lg-6 col-5 text-right">
                                            <a href="{{ url('print-history') }}" style="color: #5e72e4" class="btn btn-sm btn-neutral">Download PDF</a>
                                            <button type="button" onclick="editHistory({{$about->id}})" class="btn btn-sm btn-neutral">Edit History</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-8 pl-0">
                                        <h3>Data History for PDF</h3>
                                    </div>
                                    <div id="display-quill-history" style="display:none">
                                        <div data-toggle="quill" id="quill-history"></div>
                                        <div class="text-center">
                                            <button type="button" onclick="saveHistory({{$about->id}})" style="display:none" id="btn-save-history" class="btn btn-primary mt-2">Save</button>
                                        </div>
                                    </div>
                                    
                                    <div id="div_history">
                                        @if ($count == "0")
                                        <div id="view-history">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas assumenda quia praesentium eum sapiente harum fugiat enim, culpa quam ipsam porro, id cum natus beatae officiis reprehenderit, veritatis velit minus?
                                        </div>
                                        @else
                                        <div id="view-history">
                                            @php
                                            echo $about->history;
                                            @endphp
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6 col-5">
                                            <h3>Data Core Value</h3>
                                        </div>
                                        <div class="col-lg-6 col-5 text-right">
                                            <button type="button" onclick="addCore()" class="btn btn-sm btn-neutral">Add Core Value</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive py-4">
                                        <table class="table table-flush" id="datatable-basic">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="col-1">No</th>
                                                    <th class="col-3">Name Core</th>
                                                    <th>Text Core</th>
                                                    <th class="col-1">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="col-1">No</th>
                                                    <th class="col-3">Name Core</th>
                                                    <th>Text Core</th>
                                                    <th class="col-1">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @if ($count_b == "0")
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @else
                                                
                                                @php
                                                $no = 0;
                                                @endphp
                                                @foreach ($core as $items)
                                                <tr>
                                                    <td>{{ ++$no }}</td>
                                                    <td>{{ $items->name }}</td>
                                                    <td>
                                                        @php
                                                        echo $items->text;
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        <a type="button" class="table-action btn-edit-core table-action-edit" data-id="{{ $items->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')

<div class="modal fade" id="modal-add-core" tabindex="-1" role="dialog" aria-labelledby="modal-add-core" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Core</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-add-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body">
                        <div class="form-group">
                            
                            <label class="form-control-label">Name Core</label>
                            <input type="text" class="form-control mb-3" id="name-add-core" placeholder="Name Core">
                            
                            <label class="form-control-label">Text Core</label>
                            <div data-toggle="quill" id="quill-add-core" data-quill-placeholder="Text Core"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center modal-footer">
                <button type="submit" class="btn btn-primary" onclick="saveAddCore()">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit-core" tabindex="-1" role="dialog" aria-labelledby="modal-edit-core" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Core</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-edit-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body">
                        <div class="form-group">
                            
                            <label class="form-control-label">Name Core</label>
                            <input type="text" class="form-control mb-3" id="name-edit-core">
                            
                            <label class="form-control-label">Text Core</label>
                            <div  data-toggle="quill" id="quill-edit-core"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-5" id="button-save-edit">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.min.js"></script>
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
    function addCore() {
        $('#modal-add-core').modal('show')
    }
    $('.btn-edit-core').on('click', function(){
        let id = $(this).data('id')
        $.ajax({
            url: '{{ url('/getData-core/') }}' + '/' + id,
            method: "GET",
            success: function(data){
                $('#name-edit-core').val(data.name)
                $('#quill-edit-core > .ql-editor').html(data.text)
                $('#modal-edit-core').modal('show')
                $('#button-save-edit').attr('onClick', 'updateCore(' + id + ')')
            },
            error: function(error){
                console.log(error)
            },
        })
    })
    function saveAddCore() {
        var name = $("#name-add-core").val()
        var text = $('#quill-add-core > .ql-editor').html()
        
        $.ajax({
            type: 'POST',
            url: '{{ url('/save-add-core/store') }}',
            data: {name: name, text: text},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('/about-admin')}}")
            }
        });
    }
    function updateCore(id) {
        
        var name = $("#name-edit-core").val()
        var text = $('#quill-edit-core > .ql-editor').html()
        
        $.ajax({
            type: 'POST',
            url: '{{ url('/save-edit-core/update') }}' + '/' + id,
            data: {name: name, text: text},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('/about-admin')}}")
            }
        });
    }
    function editVisi(id) {
        document.getElementById('display-quill-visi').style.display = 'block';
        document.getElementById('display-quill-misi').style.display = 'none';
        document.getElementById('display-quill-history').style.display = 'none';
        
        document.getElementById('view-visi').style.display = 'none';
        document.getElementById('view-misi').style.display = 'block';
        document.getElementById('view-history').style.display = 'block';
        
        document.getElementById('btn-save-visi').style.display = 'inline';
        document.getElementById('btn-save-misi').style.display = 'none';
        document.getElementById('btn-save-history').style.display = 'none';
        
        $.ajax({
            url: `/getData-visi/${id}`,
            method: "GET",
            success: function(data){
                $('#quill-visi > .ql-editor').html(data.visi);
            },
            error: function(error){
                console.log(error)
            },
        })
    }
    
    function editMisi(id) {
        document.getElementById('display-quill-visi').style.display = 'none';
        document.getElementById('display-quill-misi').style.display = 'block';
        document.getElementById('display-quill-history').style.display = 'none';
        document.getElementById('view-visi').style.display = 'block';
        document.getElementById('view-misi').style.display = 'none';
        document.getElementById('view-history').style.display = 'block';
        
        document.getElementById('btn-save-visi').style.display = 'none';
        document.getElementById('btn-save-misi').style.display = 'inline';
        document.getElementById('btn-save-history').style.display = 'none';
        
        $.ajax({
            url: `/getData-misi/${id}`,
            method: "GET",
            success: function(data){
                $('#quill-misi > .ql-editor').html(data.misi);
            },
            error: function(error){
                console.log(error)
            },
        })
    }
    
    function editHistory(id) {
        document.getElementById('display-quill-visi').style.display = 'none';
        document.getElementById('display-quill-misi').style.display = 'none';
        document.getElementById('display-quill-history').style.display = 'block';
        document.getElementById('view-visi').style.display = 'block';
        document.getElementById('view-misi').style.display = 'block';
        document.getElementById('view-history').style.display = 'none';
        
        document.getElementById('btn-save-visi').style.display = 'none';
        document.getElementById('btn-save-misi').style.display = 'none';
        document.getElementById('btn-save-history').style.display = 'inline';
        
        $.ajax({
            url: `/getData-history/${id}`,
            method: "GET",
            success: function(data){
                $('#quill-history > .ql-editor').html(data.history);
            },
            error: function(error){
                console.log(error)
            },
        })
    }
    function saveVisi(id) {
        var visi = $('#quill-visi > .ql-editor').html();
        $.ajax({
            type: 'POST',
            url: '{{ url('postData-visi') }}' + '/' + id,
            data: {visi: visi},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('/about-admin')}}")
            }
        });
    }
    function saveMisi(id) {
        var misi = $('#quill-misi > .ql-editor').html();
        $.ajax({
            type: 'POST',
            url: '{{ url('postData-misi') }}' + '/' + id,
            data: {misi: misi},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('/about-admin')}}")
            }
        });
    }
    function saveHistory(id) {
        var history = $('#quill-history > .ql-editor').html();
        $.ajax({
            type: 'POST',
            url: '{{ url('postData-history') }}' + '/' + id,
            data: {history: history},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data){
                location.replace("{{ url('/about-admin')}}")
            }
        });
    }
</script>
@endsection