<section class="blog-area mb--70 mb-md--50">
    <div class="container">
        <div class="col-12 text-center mb-5">
            <h2>Founder Of Orcana Universal</h2>
        </div>
        <div class="row mb--28 mb-md--18 mb-sm--33">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach ($founder as $item)
                        <div class="col-lg-3 col-sm-6 mb--45">
                            @php
                                $img = unserialize($item->img);
                            @endphp
                            <img src="{{ asset('images/'.$img[0]) }}" class="rounded-circle mb-5" alt="Product">
                            <div class="product-info">
                                <div class="product-category text-center">
                                    <a href="#"><h1><strong>{{$item->name}}</strong></h1></a>
                                    <h2>{{$item->position}}</h2>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>