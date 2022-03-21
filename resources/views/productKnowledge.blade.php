@extends('layouts.master')
@section('headerName', 'Product Knowledge')
@section('content')
    <!-- Breadcrumb area Start -->
    <section class="bg-color ptb--80" data-bg-color="#fdedc9">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title" style="color: black">Product Knowledge</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb area End -->
    <!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
    <div class="inner-page-content ptb--80 ptb-md--60">
        <div class="container">
            <div class="row">
                @livewire('product-knowledge')
                <div class="col-lg-3">
                    <div class="blog-sidebar pl--15 pl-lg--0">
                        <div class="bl-widget post mt--50">
                            <div class="inner">
                                <h5 class="title">Top News</h5>
                                <ul class="post-list">
                                    @foreach ($seen as $item)
                                    <li>
                                        <a href="{{url('detail-knowledge/'.$item->id)}}">{{$item->title}}</a>
                                        <span><i class="fa fa-clock-o"></i>{{date_diff(date_create(date('d-m-Y', strtotime($item->created_at))),date_create(date('d-m-Y', strtotime(Carbon\Carbon::now()))))->d}} Days Ago</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Wrapper End -->
@endsection