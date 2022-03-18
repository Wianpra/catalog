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
                @foreach ($knowledge as $item)
                <div class="item">
                    <article class="blog">
                        <div class="blog__inner">
                            <div class="blog__media">
                                <figure class="image">
                                    @php
                                    $img = unserialize($item->img);
                                    @endphp
                                    @if ($img == null)
                                    <img src="{{asset('assets/img/blog/blog-06.jpg')}}" alt="Blog" class="w-100">
                                    @else
                                    <img src="{{asset('images/'.$img[0])}}" alt="Blog" width="810px" height="260px">
                                    @endif
                                    <a href="{{url('detail-knowledge/'.$item->id)}}" ></a>
                                </figure>
                            </div>
                            <div class="blog__info">
                                <h2 class="blog__title"><a href="{{url('detail-knowledge/'.$item->id)}}">{{$item->title}}</a></h2>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</section>
<!-- Blog Area End -->