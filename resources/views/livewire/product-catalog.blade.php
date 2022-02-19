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
                                        <p class="product-pages">Showing Result  08 Among  72</p>
                                        <div class="product-view-mode ml--50 ml-xs--0">
                                            <a class="active" href="#" data-target="grid">
                                                <img src="assets/img/icons/grid.png" alt="Grid">
                                            </a>
                                            <a href="#" data-target="list">
                                                <img src="assets/img/icons/list.png" alt="Grid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-products">
                            <div class="row">
                                @foreach ($product as $item)
                                <div class="col-xl-4 col-sm-6 mb--50">
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
                                                <a href="product-details.html" class="product-overlay"></a>
                                                <div class="product-action">
                                                    <a data-bs-toggle="modal" data-bs-target="#productModal" class="action-btn">
                                                        <i class="la la-eye"></i>
                                                    </a>
                                                    @if ($item->seen = null)
                                                    0
                                                    @else
                                                    {{ $item->seen }}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-category">
                                                    <a style="text-transform: capitalize" href="product-details.html">
                                                        @foreach ($category as $data)
                                                        @if ( $item->category == $data->id)
                                                        {{ $data->category }}
                                                        @endif
                                                        @endforeach
                                                        
                                                    </a>
                                                </div>
                                                <h3 class="product-title"><a style="text-transform: capitalize" href="product-details.html">{{ $item->name }}</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ft-product-list">
                                        <div class="product-inner">
                                            <figure class="product-image img-thumbnail">
                                                <a href="product-details.html">
                                                    
                                                    @php
                                                    $img = unserialize($item->img);
                                                    @endphp
                                                    @if ( $img == null )
                                                    <img src="assets/img/products/prod-04-270x300.jpg" class="img-thumbnail mx-auto d-block" alt="Products">
                                                    @else
                                                    <img src="{{ asset('images/'.$img[0]) }}" style="height: 300px; object-fit: contain;" class="mx-auto d-block" alt="Product">
                                                    @endif
                                                </a>
                                                <div class="product-thumbnail-action">
                                                    <a data-bs-toggle="modal" data-bs-target="#productModal" class="action-btn quick-view">
                                                        <i class="la la-eye"></i>
                                                    </a>
                                                </div>
                                                @if ($item->seen = null)
                                                0
                                                @else
                                                {{ $item->seen }}
                                                @endif
                                            </figure>
                                            <div class="product-info">
                                                <h3 class="product-title mb--25">
                                                    <a href="product-details.html">{{ $item->name }}</a>
                                                </h3>
                                                <p class="product-short-description mb--20">
                                                    {{ $item->description }}
                                                </p>  
                                                <div class="ft-product-action-list d-flex align-items-center">
                                                    <a href="cart.html" class="btn btn-size-md">Add To Cart</a>
                                                    <a href="wishlist.html" class="ml--20 action-btn">
                                                        <i class="la la-heart-o"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="ml--20 action-btn">
                                                        <i class="la la-repeat"></i>
                                                    </a>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
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
