@extends('layouts.master')
@section('headerName', 'Product Detail')
@section('content')
<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
    <div class="page-content-inner pt--80 pt-md--60">
        <div class="container">
            <div class="row g-0 mb--80 mb-md--57">
                <div class="col-lg-7 product-main-image">
                    <div class="product-image">
                        <div class="product-gallery">
                            <div class="product-gallery__large-image mb--30">
                                <div class="product-gallery__wrapper">
                                    <div class="element-carousel main-slider image-popup"
                                    data-slick-options='{
                                        "slidesToShow": 1,
                                        "slidesToScroll": 1,
                                        "infinite": true,
                                        "arrows": false, 
                                        "asNavFor": ".nav-slider"
                                    }'>
                                    
                                    @php
                                    $img = unserialize($product->img);
                                    $count = count($img);
                                    @endphp
                                    @if ( $img == null )
                                    <figure class="product-gallery__image zoom">
                                        <img src="{{ asset('/') }}assets/img/products/prod-08-700x778.png" alt="Products">
                                    </figure>
                                    @else
                                    @for ($i=0; $i < $count; $i++)
                                    <figure class="product-gallery__image zoom">
                                        <img src="{{ asset('images/'.$img[$i]) }}" alt="Products">
                                    </figure>
                                    @endfor
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="product-gallery__nav-image">
                            <div class="element-carousel nav-slider product-slide-nav slick-vertical-center" 
                            data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 3,
                                "slidesToScroll": 1,
                                "swipe": true,
                                "infinite": true,
                                "focusOnSelect": true,
                                "asNavFor": ".main-slider",
                                "arrows": true, 
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "la la-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "la la-angle-right" }
                            }'
                            data-slick-responsive='[
                            {
                                "breakpoint":767, 
                                "settings": {
                                    "slidesToShow": 4
                                } 
                            },
                            {
                                "breakpoint":575, 
                                "settings": {
                                    "slidesToShow": 3
                                } 
                            },
                            {
                                "breakpoint":480, 
                                "settings": {
                                    "slidesToShow": 2
                                } 
                            }
                            ]'>
                            
                            @php
                            $img = unserialize($product->img);
                            $count = count($img);
                            @endphp
                            @if ( $img == null )
                            <figure class="product-gallery__nav-image--single">
                                <img src="{{ asset('/') }}assets/img/products/prod-08-170x195.png" alt="Products" class="img-thumbnail">
                            </figure>
                            @else
                            @for ($i=0; $i < $count; $i++)
                            <figure class="product-gallery__nav-image--single">
                                <img src="{{ asset('images/'.$img[$i]) }}" alt="Products" style="height: 170px !important" class="img-thumbnail">
                            </figure>
                            @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 offset-xl-1 col-lg-5 product-main-details mt-md--50">
            <div class="product-summary pl-lg--30 pl-md--0">
                <h3 class="product-title mb--20">{{ $product->name }}</h3>
                <p class="product-short-description mb--20">
                    @php
                    echo $product->description;
                    @endphp
                </p>
                <div class="product-action d-flex flex-sm-row align-items-sm-center flex-column align-items-start mb--10">
                    <button type="button" class="btn btn-size-sm btn-shape-square col-3" id="button1" onclick="fungsiShow({{$data}})">
                        Order
                    </button>
                    <button type="button" class="btn btn-size-sm btn-shape-square col-3" id="button2" onclick="fungsiHide({{$data}})" hidden>
                        X
                    </button>
                    @foreach ($data as $item)
                    @php
                    $nama = strtolower($item->nama);
                    $content1 = Str::substr($item->content, 0, 2);
                    $content2 = Str::substr($item->content, 2);
                    @endphp
                    @if ($item->nama == 'Whatsapp' && $item->fungsi == "Coconut Product")
                    <a href="https://wa.me/{{$item->content}}" class="btn btn-size-sm btn-shape-square col-3" id="{{$item->nama}}" target="_blank" hidden>
                        <i class="la la-{{$nama}}" ></i>
                    </a>
                    @elseif ($item->nama != 'Whatsapp')
                    <a href="{{$item->content}}" class="btn btn-size-sm btn-shape-square col-3" id="{{$item->nama}}" target="_blank" hidden>
                        <i class="la la-{{$nama}}"></i>
                    </a>
                    @endif
                    @endforeach
                </div>
                <div class="product-footer-meta">
                    <p><span>Category:</span>
                        @foreach ($category as $item)
                        @if ( $product->category == $item->id)
                        {{ $item->category }}                                
                        @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb--75 mb-md--55">
        <div class="col-12">
            <div class="element-carousel slick-vertical-center" data-slick-options='{
                "spaceBetween": 30,
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "arrows": true,
                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "la la-angle-double-left" },
                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "la la-angle-double-right" }
            }'
            data-slick-responsive= '[
            {"breakpoint":1199, "settings": {
                "slidesToShow": 3
            }},
            {"breakpoint":991, "settings": {
                "slidesToShow": 2
            }},
            {"breakpoint":575, "settings": {
                "slidesToShow": 1
            }}
            ]'>
            <div class="item">
                <div class="ft-product">
                    <div class="product-inner">
                        <div class="product-image">
                            <figure class="product-image--holder">
                                <img src="{{ asset('/') }}assets/img/products/prod-04-270x300.jpg" alt="Product">
                            </figure>
                            <a href="product-details.html" class="product-overlay"></a>
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
                        <div class="product-info">
                            <div class="product-category">
                                <a href="product-details.html">Chair</a>
                            </div>
                            <h3 class="product-title"><a href="product-details.html">Golden Easy Spot Chair.</a></h3>
                            <div class="product-info-bottom">
                                <div class="product-price-wrapper">
                                    <span class="money">$150</span>
                                </div>
                                <a href="cart.html" class="add-to-cart pr--15">
                                    <i class="la la-plus"></i>
                                    <span>Add To Cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ft-product">
                    <div class="product-inner">
                        <div class="product-image">
                            <figure class="product-image--holder">
                                <img src="{{ asset('/') }}assets/img/products/prod-01-270x300.jpg" alt="Product">
                            </figure>
                            <a href="product-details.html" class="product-overlay"></a>
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
                        <div class="product-info">
                            <div class="product-category">
                                <a href="product-details.html">Chair</a>
                            </div>
                            <h3 class="product-title"><a href="product-details.html">Golden Easy Spot Chair.</a></h3>
                            <div class="product-info-bottom">
                                <div class="product-price-wrapper">
                                    <span class="money">$150</span>
                                </div>
                                <a href="cart.html" class="add-to-cart pr--15">
                                    <i class="la la-plus"></i>
                                    <span>Add To Cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ft-product">
                    <div class="product-inner">
                        <div class="product-image">
                            <figure class="product-image--holder">
                                <img src="{{ asset('/') }}assets/img/products/prod-02-270x300.jpg" alt="Product">
                            </figure>
                            <a href="product-details.html" class="product-overlay"></a>
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
                        <div class="product-info">
                            <div class="product-category">
                                <a href="product-details.html">Chair</a>
                            </div>
                            <h3 class="product-title"><a href="product-details.html">Golden Easy Spot Chair.</a></h3>
                            <div class="product-info-bottom">
                                <div class="product-price-wrapper">
                                    <span class="money">$150</span>
                                </div>
                                <a href="cart.html" class="add-to-cart pr--15">
                                    <i class="la la-plus"></i>
                                    <span>Add To Cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ft-product">
                    <div class="product-inner">
                        <div class="product-image">
                            <figure class="product-image--holder">
                                <img src="{{ asset('/') }}assets/img/products/prod-03-270x300.jpg" alt="Product">
                            </figure>
                            <a href="product-details.html" class="product-overlay"></a>
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
                        <div class="product-info">
                            <div class="product-category">
                                <a href="product-details.html">Chair</a>
                            </div>
                            <h3 class="product-title"><a href="product-details.html">Golden Easy Spot Chair.</a></h3>
                            <div class="product-info-bottom">
                                <div class="product-price-wrapper">
                                    <span class="money">$150</span>
                                </div>
                                <a href="cart.html" class="add-to-cart pr--15">
                                    <i class="la la-plus"></i>
                                    <span>Add To Cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper End -->
@endsection

@section('script')
<script>
    function fungsiShow(data) {
        data.forEach(function(item) {
            document.getElementById(item.nama).hidden = false;
        });
        document.getElementById("button2").hidden = false;
        document.getElementById("button1").hidden = true;
    }
    function fungsiHide(data) {
        data.forEach(function(item) {
            document.getElementById(item.nama).hidden = true;
        });
        document.getElementById("button2").hidden = true;
        document.getElementById("button1").hidden = false;
    }
    function wa(data){
        let text = "Hi, Sis ^^ Is product " + data + " still available?";
        // let text = "Hai, kak ^^ Apakah produk " + data + " masih ada?";
        let url = "https://api.whatsapp.com/send?phone=6285325556514&text=";
        let encoded = encodeURI(text);
        window.open(url+text, "_blank");
    }
</script>
@endsection