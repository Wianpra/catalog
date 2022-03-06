@extends('layouts.master')
@section('headerName', 'Home')
@section('content')
<!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
    <!-- Slider area Start -->
    <section class="homepage-slider mb--75 mb-md--55">
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
                    <div class="single-slide align-items-center bg-color" data-bg-color="#fdedc9">
                        <figure data-animation="fadeInUp" data-duration=".3s" data-delay=".3s" class="plr--15">
                            <img src="https://c0.wallpaperflare.com/preview/565/228/846/japanese-japan-restaurant-culture.jpg" alt="Slider O1 image" class="mx-auto" width="100%">
                        </figure>
                    </div>
                </div>
                
                @endforeach
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
                                    @foreach ($data as $item)
                                    @php
                                    $nama = strtolower($item->nama);
                                    $content1 = Str::substr($item->content, 0, 2);
                                    $content2 = Str::substr($item->content, 2);
                                    @endphp
                                    @if ($item->nama == 'Whatsapp' && $item->fungsi == "Coconut Product")
                                    <div class="col-12">
                                        <a href="https://wa.me/{{$item->content}}" class="action-btn" target="_blank">
                                            <i class="la la-{{$nama}}" ></i>
                                        </a>
                                    </div>
                                    @elseif ($item->nama != 'Whatsapp')
                                    <div class="col-12">
                                        <a href="{{$item->content}}" class="action-btn" target="_blank">
                                            <i class="la la-{{$nama}}"></i>
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
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

<!-- Product Tab Area Start -->
<section class="product-tab-area mb--30 mb-md--10">
    <div class="container">
        @livewire('index-catalog')
    </div>
</section>
<!-- Product Tab Area End -->

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

<section class="blog-area mb--70 mb-md--50">
    <div class="container">
        <div class="col-12 text-center mb-5">
            <h2>Founder Of Orcana Universal</h2>
        </div>
        <div class="row mb--28 mb-md--18 mb-sm--33">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 mb--45">
                            <img src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="rounded-circle mb-5" alt="Product" width="270px" height="270px">
                            <div class="product-info">
                                <div class="product-category text-center">
                                    <a href="product-details.html"><h1><strong>Name</strong></h1></a>
                                    <h2>Position</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb--45">
                            <img src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="rounded-circle mb-5" alt="Product" width="270px" height="270px">
                            <div class="product-info">
                                <div class="product-category text-center">
                                    <a href="product-details.html"><h1><strong>Name</strong></h1></a>
                                    <h2>Position</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb--45">
                            <img src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="rounded-circle mb-5" alt="Product" width="270px" height="270px">
                            <div class="product-info">
                                <div class="product-category text-center">
                                    <a href="product-details.html"><h1><strong>Name</strong></h1></a>
                                    <h2>Position</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb--45">
                            <img src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="rounded-circle mb-5" alt="Product" width="270px" height="270px">
                            <div class="product-info">
                                <div class="product-category text-center">
                                    <a href="product-details.html"><h1><strong>Name</strong></h1></a>
                                    <h2>Position</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<!-- Main Content Wrapper End -->
@endsection