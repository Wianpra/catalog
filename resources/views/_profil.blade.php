@extends('layouts._master')
@extends('layouts._header')
@section('headerName', 'Company Profile')
@section('nav', 'Company Profile')
@section('headerURL', 'profile-admin')

@section('css')
@endsection

@section('content')

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 order-xl-2">
            <div class="card card-profile">
                <img src="{{ asset('/') }}assets/_admin/assets/img/theme/img-1-1000x600.jpg" style="height: 150px; object-fit: cover;" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{ asset('/') }}assets/_admin/assets/img/theme/team-4.jpg" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-sm btn-info mr-4" onclick="editProfile({{ Auth::user()->id }})" data-toggle="modal" data-target="#modal-form">Edit Profile</button>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-center">
                        <h5 class="h3">
                            {{ Auth::user()->name }}
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{ Auth::user()->email }}
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>Lorem ipsum dolor sit amet - consectetur adipiscing elit
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>Used do eiusmod tempor incididunt ut
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-5 text-right">
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body">
                            <form onsubmit="return validateForm()" role="form" action="{{ url('profile-admin/update') }}/{{ Auth::user()->id }}" method="post">
                                @csrf
                                <div class="form-group" id="nameDanger">
                                    <div class="input-group input-group-prepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <input style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;" type="text" class="form-control" id="nameVal" name="name">
                                        <div class="invalid-feedback text-left" id="nameText">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="emailDanger">
                                    <div class="input-group input-group-prepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;" type="text" class="form-control" id="emailVal" name="email">
                                        <div class="invalid-feedback text-left" id="emailText">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="passDanger">
                                    <div class="input-group input-group-prepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;" type="password" class="form-control" placeholder="********" name="password" id="passVal">
                                        <div class="invalid-feedback text-left" id="passText">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-2">Save</button>
                                </div>
                            </form>
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
                &copy; 2022 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">CreLunarian</a>
            </div>
        </div>
    </div>
</footer>
@endsection

@section('script')
<script>
    function editProfile(id) {
        $.ajax({
            url: '{{ url('/profile-admin/edit') }}' + '/' + id,
            type: 'GET',
            success: function(data) {
                $('#nameVal').val(data.name)
                $('#emailVal').val(data.email)
            }
        })
    }
    
</script>
<script>
    function validateForm() {
        // name
        if (document.getElementById('nameVal').value == "") {
            $('#nameText').html("Name can not be empty");
            document.getElementById('nameVal').classList.add("is-invalid");
            document.getElementById('nameDanger').classList.add("has-danger");
            $('#nameVal').focus();
            return false;
        }else{
            document.getElementById('nameVal').classList.remove("is-invalid");
            document.getElementById('nameDanger').classList.remove("has-danger");
        }
        if (document.getElementById('nameVal').value.length > 255) {
            $('#nameVal').html("Name cannot be longer than 255 characters");
            document.getElementById('nameVal').classList.add("is-invalid");
            document.getElementById('nameDanger').classList.add("has-danger");
            $('#nameVal').focus();
            return false;
        }else{
            document.getElementById('nameVal').classList.remove("is-invalid");
            document.getElementById('nameDanger').classList.remove("has-danger");
        }
        
        // email
        if (document.getElementById('emailVal').value == "") {
            $('#emailText').html("Email can not be empty");
            document.getElementById('emailVal').classList.add("is-invalid");
            document.getElementById('emailDanger').classList.add("has-danger");
            $('#emailVal').focus();
            return false;
        }else{
            document.getElementById('emailVal').classList.remove("is-invalid");
            document.getElementById('emailDanger').classList.remove("has-danger");
        }
        if (document.getElementById('emailVal').value.length > 255) {
            $('#emailText').html("Email cannot be longer than 255 characters");
            document.getElementById('emailVal').classList.add("is-invalid");
            document.getElementById('emailDanger').classList.add("has-danger");
            $('#emailVal').focus();
            return false;
        }else{
            document.getElementById('emailVal').classList.remove("is-invalid");
            document.getElementById('emailDanger').classList.remove("has-danger");
        }
        
        // password
        if (document.getElementById('passVal').value != "") {
            if (document.getElementById('passVal').value.length < 8) {
                $('#passText').html("Password cannot be less than 8 characters");
                document.getElementById('passVal').classList.add("is-invalid");
                document.getElementById('passDanger').classList.add("has-danger");
                $('#passVal').focus();
                return false;
            }else{
                document.getElementById('passVal').classList.remove("is-invalid");
                document.getElementById('passDanger').classList.remove("has-danger");
            }
            
            if (document.getElementById('passVal').value.length > 255) {
                $('#passText').html("Password cannot be longer than 255 characters");
                document.getElementById('passVal').classList.add("is-invalid");
                document.getElementById('passDanger').classList.add("has-danger");
                $('#passVal').focus();
                return false;
            }else{
                document.getElementById('passVal').classList.remove("is-invalid");
                document.getElementById('passDanger').classList.remove("has-danger");
            }
        }
        return true;
    }
</script>
@endsection