@extends('layouts.master')
@section('headerName', 'Home')
@section('content')
<!-- Main Content Wrapper Start -->
<main class="main-content-wrapper">
    <!-- Slider area Start -->
    @livewire('banner-index')
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
                $idCategory = App\Category::findOrFail($value->category)->main_category;
                $idMain = App\mainCategories::findOrFail($idCategory)->main_category;
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
                                    @if ($item->nama == 'Whatsapp')
                                    @if ($item->fungsi == $idMain)
                                    <div class="col-12">
                                        <a href="https://wa.me/{{$item->content}}" class="action-btn" target="_blank">
                                            <i class="la la-{{$nama}}" ></i>
                                        </a>
                                    </div>
                                    @endif
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

@livewire('index-knowledge')

@livewire('index-founder')
</main>
<!-- Main Content Wrapper End -->
@endsection