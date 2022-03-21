@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Social Media')
@section('nav', 'Data Social Media')
@section('headerURL', 'sosmed-admin')

@section('css')
<!-- Page plugins -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/_admin/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('assets/_admin/assets/vendor/select2/dist/css/select2.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
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
                            <h3 class="mb-0">Social Media</h3>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <button type="button" class="btn btn-sm btn-primary" onclick="addSosmed()">Add Other Social Media</button>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addWA()">Add Social Media Whatsapp</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-sosmed') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Data Social Media Whatsapp</h3>
                                    </div>
                                    <div class="card-body" id="formWhatsapp">

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Data Others Social Media</h3>
                                    </div>
                                    <div class="card-body" id="formSosmed">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="buttonSosmed">
                            
                        </div>
                    </form>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center text-lg-left text-muted">
                            &copy; 2022 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Lunarian</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/_admin/assets/vendor/select2/dist/js/select2.min.js')}}"></script>
<script>
    $('document').ready(function () {
        $.ajax({
            url: "{{ route('get-sosmed') }}",
            success: function (data) {
                if (data[0] == "") {
                    console.log(data);
                }else {
                    data[0].forEach(function (item, index) {
                        if (item.nama == 'Whatsapp') {
                        $('#formWhatsapp').append(`
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Number</label>
                                    <input type="text" class="form-control" name="content[]" value="`+ item.content +`">
                                </div>
                                <div class="col-4">
                                    <label for="">Function</label>
                                    <select name="function[]" id="`+item.id+`" class="form-control">
                                        <option value="Complain">Complain</option>`+
                                        data[1].map(function (value) {
                                                return '<option value="'+value.main_category+'">'+ value.main_category +'</option>'
                                        }).join("")
                                        +`
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="user[]" value="`+ item.username +`">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="nama[]" value="`+ item.nama +`">
                            <input type="hidden" class="form-control" name="data[]" value="`+ item.id +`">
                        </div>`)
                        $("#"+item.id).select2()
                        $("#"+item.id).val(item.fungsi)
                        $("#"+item.id).trigger('change')
                        $("#"+item.id+" option[value='"+item.fungsi+"']").prop('selected', true)
                        } else {
                            $('#formSosmed').append(`
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="">Social Media Name</label>
                                        <input type="text" class="form-control" name="nama[]" value="`+ item.nama +`">
                                    </div>
                                    <div class="col-4">
                                        <label for="">URL/Number</label>
                                        <input type="text" class="form-control" name="content[]" value="`+ item.content +`">
                                    </div>
                                    <div class="col-4">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="user[]" value="`+ item.username +`">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="function[]" value="">
                                <input type="hidden" class="form-control" name="data[]" value="`+ item.id +`">
                            </div>`)
                        }
                    })
                    $('#buttonSosmed').append(`<button type="submit" class="btn btn-primary">Simpan</button>`)
                }
            }
        })
    })
    
    function addSosmed() {
        $('#formSosmed').append(`
        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label for="">Social Media Name</label>
                    <input type="text" class="form-control" name="nama[]">
                </div>
                <div class="col-4">
                    <label for="">URL/Number</label>
                    <input type="text" class="form-control" name="content[]">
                </div>
                <div class="col-4">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="user[]">
                </div>
            </div>
            <input type="hidden" class="form-control" name="function[]" value="">
            <input type="hidden" class="form-control" name="data[]" value="new">
        </div>`)
        $('#buttonSosmed').html('')
        $('#buttonSosmed').append(`<button type="submit" class="btn btn-primary">Simpan</button>`)
    }
    
    function addWA() {
        $.ajax({
            url: "{{ route('get-sosmed') }}",
            success: function (data) {
                $('#formWhatsapp').append(`
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label for="">Number</label>
                            <input type="text" class="form-control" name="content[]">
                        </div>
                        <div class="col-4">
                            <label for="">Function</label>
                            <select name="function[]" class="form-control select2" id="fungsi">
                                <option value="Complain">Complain</option>`+
                                data[1].map(function (value) {
                                        return '<option value="'+ value.main_category +'">'+ value.main_category +'</option>'
                                }).join("")
                                +`
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="user[]">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="nama[]" value="Whatsapp">
                    <input type="hidden" class="form-control" name="data[]" value="new">
                </div>`)
                $("#fungsi").select2()
                $('#buttonSosmed').html('')
                $('#buttonSosmed').append(`<button type="submit" class="btn btn-primary">Simpan</button>`)
            }
        })
    }
</script>
@endsection