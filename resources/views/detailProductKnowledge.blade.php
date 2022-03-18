@extends('layouts.master')
@section('headerName', 'Detail Product Knowledge')
@section('content')
<section class="page-title-area-2 bg-color" data-bg-color="#fff">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="sr-only">Blog Details</h1>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
    <div class="inner-page-content">
        <!-- Single Post Area Start -->
        <div class="single-post-area ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <!-- Single Post Start -->
                        <article class="single-post">
                            <header class="single-post__header">
                                <h2 class="single-post__title">{{$data->title}}</h2>
                                <div class="single-post__media">
                                    @php
                                        $img = unserialize($data->img);
                                    @endphp
                                    <figure class="image">
                                        @if ($img == null)
                                        <img src="{{asset('assets/img/blog/blog-06.jpg')}}" alt="Single Post Title" class="w-100">
                                        @else
                                        <img src="{{asset('images/'.$img[0])}}" alt="Single Post Title" class="w-100">
                                        @endif
                                    </figure>
                                </div>
                                <div class="single-post__header-meta">
                                    <span class="posted-on">{{date('d M, Y', strtotime($data->created_at))}}</span>
                                    <span class="post-category">{{$main_category->main_category}}</span>
                                </div>
                            </header>
                            <div class="single-post__info">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        {!! $data->article !!}
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!-- Single Post End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Post Area End -->

        <!-- Related Post Area Start -->
        <section class="related-post-area mb--80 mb-md--60">
            <div class="container">
                <div class="row mb--50">
                    <div class="col-12 text-center">
                        <h2>You may Also Like</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="element-carousel slick-dot-mt-40 related-post-carousel" data-slick-options='{
                            "spaceBetween": 30,
                            "slidesToShow": 2,
                            "slidesToScroll": 1,
                            "dots": true,
                            "infinite": true, 
                            "centerMode": true
                        }' data-slick-responsive='[
                            {"breakpoint": 768, "settings": {"slidesToShow": 1}}
                        ]'>
                            @foreach ($recomendation as $item)
                            <div class="item">
                                <div class="related-post">
                                    <div class="related-post__inner">
                                        <div class="related-post__media">
                                            @php
                                                $img = unserialize($item->img);
                                            @endphp
                                            <figure class="image">
                                                <a href="{{url('detail-knowledge/'.$item->id)}}">
                                                    @if ($img == null)
                                                    <img src="{{asset('assets/img/blog/blog-06.jpg')}}" alt="Single Post Title" class="w-100">
                                                    @else
                                                    <img src="{{asset('images/'.$img[0])}}" alt="Single Post Title" class="w-100">
                                                    @endif
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="related-post__info">
                                            <h3 class="related-post__title"><a href="blog-details-image.html">{{$item->title}}</a></h3>
                                            <span class="related-post__date">{{date('d M, Y', strtotime($item->created_at))}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related Post Area End -->
    </div>
</main>
<!-- Main Content Wrapper End -->
@endsection

@section('script')
<script>
    $( document ).ready(function () {
    $.ajax({
            url: "{{url('getProduct')}}" + "/" + "{{$data->id}}",
            success: function(data){
                data.forEach(function (item) {
                    $('#product').append(`${item.name}`)
                });
            }
        });
    })
</script>
@endsection