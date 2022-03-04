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
                            <form role="form" action="{{ url('profile-admin/update') }}/{{ Auth::user()->id }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <input name="name" class="form-control" id="nameVal" type="text" onkeydown="return event.key != 'Enter';">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input name="email" class="form-control" id="emailVal" type="email" onkeydown="return event.key != 'Enter';">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input name="password" class="form-control" placeholder="********" type="password" onkeydown="return event.key != 'Enter';">
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
@endsection