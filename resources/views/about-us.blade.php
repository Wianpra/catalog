@extends('layouts.master')
@section('headerName', 'Product Detail')
@section('content')
<!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
    <div class="inner-page-content pt--75 pt-md--55">
        <!-- Contact Area Start -->
        <section class="contact-area mb--75 mb-md--55">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 mb-sm--30">
                        <div class="heading mb--32">
                            <h2>Vision & Mission</h2>
                            <hr class="delimeter">
                        </div>
                        <div class="contact-info mb--20">
                            <h2>Vision</h2>
                            @if ($count == "0")
                            <div style="text-align: justify">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt pariatur ex id provident perspiciatis quod sapiente, error deserunt sit dolores asperiores, suscipit consequatur dicta, tenetur rerum sequi tempore assumenda minus!
                            </div>
                            @else
                            <div style="text-align: justify">
                                @php
                                echo $about->visi;
                                @endphp
                            </div>
                            @endif
                            
                            <h2 class="mt-5">Mission</h2>
                            @if ($count == "0")
                            <div style="text-align: justify">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt pariatur ex id provident perspiciatis quod sapiente, error deserunt sit dolores asperiores, suscipit consequatur dicta, tenetur rerum sequi tempore assumenda minus!
                            </div>
                            @else
                            <div style="text-align: justify">
                                @php
                                echo $about->misi;
                                @endphp
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7 offset-lg-1">
                        <div class="heading mb--40">
                            <div class="row" style="height: 27.5px">
                                <h2 class="col-lg-10">History</h2>
                                <div class="col-lg-2 col-5 text-right">
                                    <a href="{{ url('print-history') }}" style="padding: 3px 10px; font-size:12px" class="btn btn-sm btn-neutral"><i class="la la-save"></i> PDF</a>
                                </div>
                            </div>
                            <hr class="delimeter">
                        </div>
                        <div style="text-align: center"><H2>PT. ORCANA UNIVERSAL INDONESIA</H2></div>
                        @if ($count == "0")
                        <div style="text-align: justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt pariatur ex id provident perspiciatis quod sapiente, error deserunt sit dolores asperiores, suscipit consequatur dicta, tenetur rerum sequi tempore assumenda minus!
                        </div>
                        @else
                        <div style="text-align: justify">
                            @php
                            echo $about->history;
                            @endphp
                        </div>
                        @endif
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