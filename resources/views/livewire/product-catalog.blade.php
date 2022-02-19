<div>
    <!-- Main Content Wrapper Start -->
    <div  class="main-content-wrapper">
        <div class="shop-page-wrapper ptb--80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 order-lg-2 mb-md--50">
                        <div class="shop-toolbar mb--50">
                            <div class="row align-items-center">
                                <div class="col-md-5 mb-sm--30 mb-xs--10">
                                    <div class="shop-toolbar__left">
                                        <div class="product-ordering">
                                            <select class="product-ordering__select nice-select">
                                                <option value="0">Relevance</option>
                                                <option value="1">Name, A to Z</option>
                                                <option value="2">Name, Z to A</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="shop-toolbar__right d-flex justify-content-md-end justify-content-start flex-sm-row flex-column">
                                        <p class="product-pages">
                                            @if ( $countProduct > 12)
                                            Showing Result 12 Among {{ $countProductAll }}
                                            @else
                                            Showing Result {{ $countProduct }} Among {{ $countProductAll }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-products">
                            <div class="row">
                                @foreach ($product as $item)
                                <div class="col-xl-4 col-sm-6 mb--50">
                                    <a href="{{ url('/product-detail') }}/{{ $item->id }}">
                                        <div class="ft-product">
                                            <div class="product-inner">
                                                <div class="product-image">
                                                    <figure class="product-image--holder">
                                                        @php
                                                        $img = unserialize($item->img);
                                                        @endphp
                                                        @if ( $img == null )
                                                        <img src="assets/img/products/prod-04-270x300.jpg" class="img-thumbnail" alt="Products">
                                                        @else
                                                        <img src="{{ asset('images/'.$img[0]) }}" alt="Product" class="img-thumbnail">
                                                        @endif
                                                    </figure>
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-category">
                                                        <p style="text-transform: capitalize">
                                                            @foreach ($category as $data)
                                                            @if ( $item->category == $data->id)
                                                            {{ $data->category }}
                                                            @endif
                                                            @endforeach
                                                            
                                                        </p>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <div class="row">
                                                            <p class="col-6" style="text-transform: capitalize">{{ $item->name }}</p>
                                                            <div class="float-right col-6">
                                                                @if ($item->seen == null)
                                                                <i class="la la-eye"></i> 10101010
                                                                @else
                                                                <i class="la la-eye"></i> {{ $item->seen }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <nav class="pagination-wrap">
                            <ul class="pagination">
                                <li><span class="page-number current">1</span></li>
                                <li><a href="#" class="page-number">2</a></li>
                                <li><span class="dot"></span></li>
                                <li><span class="dot"></span></li>
                                <li><span class="dot"></span></li>
                                <li><a href="#" class="page-number">16</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-3 col-lg-4 order-lg-1">
                        <aside class="shop-sidebar">
                            <div class="shop-widget mb--40">
                                <h3 class="widget-title mb--25">Category</h3>
                                <ul class="widget-list category-list">
                                    <li>
                                        <a wire:click.prevent="filterCategory(null)" role="button">
                                            <span style="text-transform: capitalize" class="category-title">All</span>
                                            <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </li>
                                    @foreach ($category as $data)
                                    <li>
                                        <a wire:click.prevent="filterCategory({{ $data->id }})" role="button">
                                            <span style="text-transform: capitalize" class="category-title">{{ $data->category }}</span>
                                            <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
</div>
