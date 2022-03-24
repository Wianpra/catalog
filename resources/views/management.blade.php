@extends('layouts.master')
@section('headerName', 'About Us')
@section('content')
<!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
    <div class="inner-page-content pt--75 pt-md--55">
        <!-- Contact Area Start -->
        <section class="contact-area mb--75 mb-md--55">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-sm--30">
                        <div class="heading mb--32">
                            <h2>Management</h2>
                            <hr class="delimeter">
                        </div>
                        <div class="contact-info mb--20">
                            @foreach ($data as $item)
                            @php
                                $img = unserialize($item->img);
                            @endphp
                            <img src="{{asset('images/'.$img[0])}}" width="100%">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Area End -->
    </div>
    <!-- Brand Logo Area End -->
</div>
</main>
<!-- Main Content Wrapper End -->
@endsection