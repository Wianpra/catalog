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
</div>
@endsection
@section('script')
<script src="{{ asset('/') }}assets/_admin/assets/vendor/quill/dist/quill.min.js"></script>
<script>
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