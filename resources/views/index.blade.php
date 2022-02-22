@extends('layouts.master')
@section('headerName', 'Home')
@section('content')
    <!-- Main Content Wrapper Start -->
    <main class="main-content-wrapper">
        <!-- Slider area Start -->
        <section class="homepage-slider mb--75 mb-md--55">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="element-carousel slick-right-bottom"
                        data-slick-options='{
                            "slidesToShow": 1, 
                            "arrows": true,
                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "la la-arrow-left" },
                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "la la-arrow-right" }
                        }' 
                        data-slick-responsive='[{"breakpoint": 768, "settings": {"arrows": false}}]'>
                            @foreach ($new as $value)
                            @php
                                $img = unserialize($value->img);
                            @endphp
                            <div class="item">
                                <div class="single-slide d-flex align-items-center bg-color" data-bg-color="#E2C28E">
                                    <div class="row align-items-center g-0 w-100">
                                        <div class="col-xl-7 col-md-6 mb-sm--50">
                                            <figure data-animation="fadeInUp" data-duration=".3s" data-delay=".3s" class="plr--15">
                                                <img src="{{ asset('images/'.$img[0]) }}" alt="Slider O1 image" class="mx-auto" width="661px" height="390px">
                                            </figure>
                                        </div>
                                        <div class="col-md-6 col-lg-5 offset-lg-1 offset-xl-0">
                                            <div class="slider-content">
                                                <div class="slider-content__text mb--40 mb-md--30">
                                                    <p class="mb--15" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">#New Treand</p>
                                                    <p class="mb--20" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">Enlight your world. Make yourself more bright.</p>
                                                    <h1 class="heading__primary lh-pt7" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">{{$value->name}}</h1>
                                                </div>
                                                <div class="slider-content__btn">
                                                    <a href="{{ url('/product-detail') }}/{{ $value->id }}" class="btn btn-outline btn-brw-2" data-animation="fadeInUp" data-duration=".3s" data-delay=".6s">Shop Now</a>
                                                </div>
                                            </div>
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
        <!-- Slider area End -->
        
        <!-- Top Sale Area Start -->
        <section class="top-sale-area mb--75 mb-md--55">
            <div class="container">
                <div class="row mb--35 mb-md--23">
                    <div class="col-12 text-center">
                        <h2>This Week Top Sales</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="element-carousel"
                        data-slick-options='{
                            "spaceBetween": 30,
                            "slidesToShow": 3
                        }'
                        data-slick-responsive='[
                            {"breakpoint": 768, "settings": {"slidesToShow": 2}},
                            {"breakpoint": 480, "settings": {"slidesToShow": 1}}
                        ]'>
                            @foreach ($top as $value)
                            @php
                                $img = unserialize($value->img);
                            @endphp
                            <div class="item">
                                <div class="ft-product">
                                    <div class="product-inner">
                                        <div class="product-image">
                                            <figure class="product-image--holder">
                                                <img src="{{ asset('images/'.$img[0]) }}" alt="Product">
                                            </figure>
                                            <a href="{{ url('/product-detail') }}/{{ $value->id }}" class="product-overlay"></a>
                                            <div class="product-action">
                                                <a data-bs-toggle="modal" data-bs-target="#productModal" class="action-btn">
                                                    <i class="la la-eye"></i>
                                                </a>
                                                <a href="wishlist.html" class="action-btn">
                                                    <i class="la la-heart-o"></i>
                                                </a>
                                                <a href="wishlist.html" class="action-btn">
                                                    <i class="la la-repeat"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info plr--20">
                                            <h3 class="product-title"><a href="{{ url('/product-detail') }}/{{ $value->id }}">{{$value->name}}</a></h3>
                                            <div class="product-info-bottom">
                                            </div>
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
        <!-- Top Sale Area End -->

        <!-- Feature Product Area Start -->
        <section class="feature-product-area mb--75 mb-md--55">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="feature-product bg-color" data-bg-color="#E2C28E">
                            <div class="feature-product__inner bg-color" data-bg-color="#E7CEA4">
                                <div class="feature-product__info">
                                    <p class="hastag">#New Style</p>
                                    <h2 class="feature-product__title"><a href="{{ url('/product-detail') }}/{{ $newest->id }}">{{$newest->name}}</a></h2>
                                    <a href="shop.html" class="feature-product__btn">Buy now</a>
                                </div>
                                @php
                                    $img = unserialize($newest->img);
                                @endphp
                                <figure class="feature-product__image mb-sm--30">
                                    <a href="{{ url('/product-detail') }}/{{ $newest->id }}">
                                        <img src="{{ asset('images/'.$img[0]) }}" alt="Feature Product" width="591px" height="239px">
                                    </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature Product Area End -->

        <!-- Product Tab Area Start -->
        <section class="product-tab-area mb--30 mb-md--10">
            <div class="container">
                @livewire('index-catalog')
            </div>
        </section>
        <!-- Product Tab Area End -->

        

        <!-- Best Sale Product Area Start -->
        <section class="best-sale-product-area mb--75 mb-md--55">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="best-sale-product bg-color" data-bg-color="#E2C28E">
                            <div class="best-sale-product__inner bg-color" data-bg-color="#ffffff">
                                @php
                                $img = unserialize($discount->img);
                                @endphp
                                <figure class="best-sale-product__img">
                                    <a href="{{ url('/product-detail') }}/{{ $discount->id }}">
                                        <img src="{{ asset('images/'.$img[0]) }}" alt="Best Sale Product" width="467 px" height="458 px">
                                    </a>
                                </figure>
                                <div class="best-sale-product__info">
                                    <h2 class="best-sale-product__heading">
                                        <span class="best-sale-product__heading--main">Best Sale</span>
                                        <span class="best-sale-product__heading--sub">Get Best Discount</span>
                                    </h2>
                                    <p class="best-sale-product__desc">It is a long established fact that a reader will be distracted by the readable content</p>
                                    <a href="shop.html" class="btn btn-outline btn-size-md btn-color-primary btn-shape-round btn-hover-2">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Best Sale Product Area End -->

        <!-- Blog Area Start -->
            <section class="blog-area mb--70 mb-md--50">
                <div class="container">
                    <div class="row mb--35 mb-md--23">
                        <div class="col-12 text-center">
                            <h2>News &amp; Updates Product Knowledges</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="element-carousel" data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 3,
                                "slidesToScroll": 1
                            }'
                            data-slick-responsive='[
                                {"breakpoint": 992, "settings": {"slidesToShow": 2}},
                                {"breakpoint": 768, "settings": {"slidesToShow": 1}}
                            ]'>
                                <div class="item">
                                    <article class="blog">
                                        <div class="blog__inner">
                                            <div class="blog__media">
                                                <figure class="image">
                                                    <img src="assets/img/blog/blog-01.jpg" alt="Blog" class="w-100">
                                                    <a href="blog-details-image.html" class="item-overlay"></a>
                                                </figure>
                                            </div>
                                            <div class="blog__info">
                                                <h2 class="blog__title"><a href="blog-details-image.html">There are many variations of passages of Lorem.</a></h2>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="item">
                                    <article class="blog">
                                        <div class="blog__inner">
                                            <div class="blog__media">
                                                <figure class="image">
                                                    <img src="assets/img/blog/blog-02.jpg" alt="Blog" class="w-100">
                                                    <a href="blog-details-image.html" class="item-overlay"></a>
                                                </figure>
                                            </div>
                                            <div class="blog__info">
                                                <h2 class="blog__title"><a href="blog-details-image.html">There are many variations of passages of Lorem.</a></h2>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="item">
                                    <article class="blog">
                                        <div class="blog__inner">
                                            <div class="blog__media">
                                                <figure class="image">
                                                    <img src="assets/img/blog/blog-03.jpg" alt="Blog" class="w-100">
                                                    <a href="blog-details-image.html" class="item-overlay"></a>
                                                </figure>
                                            </div>
                                            <div class="blog__info">
                                                <h2 class="blog__title"><a href="blog-details-image.html">There are many variations of passages of Lorem.</a></h2>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Blog Area End -->
    </main>
    <!-- Main Content Wrapper End -->
@endsection