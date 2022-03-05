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
                                            {{-- <select wire:model="selected()" class="product-ordering__select nice-select">
                                                <option value="popular">Relevance</option>
                                                <option value="asc">Name, A to Z</option>
                                                <option value="desc">Name, Z to A</option>
                                            </select> --}}
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
                                                        <img src="{{ asset('images/'.$img[0]) }}"  style=" height: 300px !important; " alt="Product" class="img-thumbnail">
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
                                                            <div class="float-right col-6" style="text-align:right !important;">
                                                                @if ($item->seen == null)
                                                                <i class="la la-eye"></i> 0
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
                        @if (count($product))
                        {{ $product->links('livewire-pagitation-product-link') }}
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-4 order-lg-1">
                        <aside class="shop-sidebar">
                            <div class="shop-widget mb--40">
                                <h3 class="widget-title mb--25">Category</h3>
                                <ul class="widget-list category-list">
                                    <li>
                                                <button  style="background-color: white;border: 0px solid white;" wire:click.prevent="filterMainCategory(null)" role="button">
                                                    <span style="text-transform: capitalize" class="category-title">All</span>
                                                </button>
                                    </li>
                                    @foreach ($main_category as $data)
                                    <li>
                                        <div class="row">
                                            <div class="col-10">
                                                <button style="background-color: white;border: 0px solid white;" wire:click.prevent="filterMainCategory({{ $data->id }})" role="button">
                                                    <span style="text-transform: capitalize" class="category-title">{{ $data->main_category }}</span>
                                                </button>
                                            </div>
                                            <div class="col-2">
                                                <button id="button-main{{ $data->id }}" style="background-color: white;border: 0px solid white;" onclick="showMain({{ $data->id }})">
                                                    <i class="fa fa-angle-right" id="arrow{{ $data->id }}"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                        @foreach ($category as $item)
                                            @if ( $data->id == $item->main_category )
                                                <li style="margin-left: 50px; display:none" class="displaySub{{$data->id}}">
                                                    <a wire:click.prevent="filterCategory({{ $item->id }})" role="button">
                                                        <span style="text-transform: capitalize" class="category-title">{{ $item->category }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
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
    
    
    <script>
        function showMain(id) {
            var elems = document.getElementsByClassName('displaySub'+id);
            var element = document.getElementById('arrow'+id);
            for (var i=0;i<elems.length;i+=1){
                elems[i].style.display = 'block';
            };
            element.classList.add("fa-angle-down");
            element.classList.remove("fa-angle-right");
            $('#button-main'+id).attr('onClick', 'hideMain(' + id + ')');
        }
        function hideMain(id) {
            var elems = document.getElementsByClassName('displaySub'+id);
            var element = document.getElementById('arrow'+id);
            for (var i=0;i<elems.length;i+=1){
                elems[i].style.display = 'none';
            };
            element.classList.remove("fa-angle-down");
            element.classList.add("fa-angle-right");
            $('#button-main'+id).attr('onClick', 'showMain(' + id + ')');
        }
    </script>
    
    <!-- Searchform Popup Start -->
    <div class="searchform__popup" id="searchForm">
        <a href="#" class="btn-close"><i class="la la-remove"></i></a>
        <div class="searchform__body">
            <p>Start typing and press Enter to search</p>
            <form class="searchform" wire:submit.prevent="Searching">
                <input type="text" wire:model.defer="search" name="popup-search" id="popup-search" class="searchform__input" placeholder="Search Entire Store..." style="height: 50px">
                <button type="submit" class="searchform__submit" data-dismiss="#searchForm"><i class="la la-search"></i></button>
            </form>
        </div>
    </div>
    <!-- Searchform Popup End -->
</div>
