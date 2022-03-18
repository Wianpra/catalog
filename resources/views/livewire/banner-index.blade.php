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
                @foreach ($banner as $value)
                @php
                $img = unserialize($value->img);
                @endphp
                <div class="item">
                    <div class="single-slide align-items-center">
                        <figure data-animation="fadeInUp" data-duration=".3s" data-delay=".3s" class="plr--15">
                            <img src="{{asset('images/'.$img[0])}}" width="100%">
                        </figure>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider area End -->