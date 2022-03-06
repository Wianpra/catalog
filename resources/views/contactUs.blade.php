@extends('layouts.master')

@section('content')
<!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
    <div class="inner-page-content pt--75 pt-md--55">
        <!-- Contact Area Start -->
        <section class="contact-area mb--75 mb-md--55">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 mb-sm--30">
                        <div class="heading mb--32">
                            <h2>Get In Touch</h2>
                            <hr class="delimeter">
                        </div>
                        <div class="contact-info mb--20">
                            <p><i class="fa fa-map-marker"></i>221b Baker St, Marylebone <br>London NW1 6XE, UK</p>
                            <p><i class="fa fa-phone"></i> +1-202-242-8157</p>
                            <p><i class="fa fa-fax"></i> +1-202-501-1829</p>
                            <p><i class="fa fa-clock-o"></i> Mon – Fri : 9:00 – 18:00</p>
                        </div>
                    </div>
                    <div class="col-md-6 offset-lg-1">
                        <div class="heading mb--40">
                            <h2>Contact Us</h2>
                            <hr class="delimeter">
                            <div class="social">
                                <div class="row">
                                    @foreach ($data as $item)
                                    @php
                                    $nama = strtolower($item->nama);
                                    $content1 = Str::substr($item->content, 0, 2);
                                    $content2 = Str::substr($item->content, 2);
                                    @endphp
                                    @if ($item->nama == 'Whatsapp' && $item->fungsi == "Complain")
                                    <div class="col-12">
                                        <a href="https://wa.me/{{$item->content}}" class="social__link" target="_blank">
                                            <i class="la la-{{$nama}}" ></i><span style="font-size: 18px"> {{"(+".$content1.")".$content2." (".$item->username.")"}}</span>
                                        </a>
                                    </div>
                                    @elseif ($item->nama != 'Whatsapp')
                                    <div class="col-12">
                                        <a href="{{$item->content}}" class="social__link" target="_blank">
                                            <i class="la la-{{$nama}}"></i><span style="font-size: 18px">  {{$item->username}}</span>
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Area End -->
        
        <!-- Brand Logo Area Start -->
        <div class="brand-logo-area bg-color ptb--75" data-bg-color="#E2C28E">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand Logo Area End -->
    </div>
</main>
<!-- Main Content Wrapper End -->
@endsection