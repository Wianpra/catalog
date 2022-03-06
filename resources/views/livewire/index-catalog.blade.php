<div>
    <div class="row mb--28 mb-md--18 mb-sm--33">
        <div class="col-md-3 text-md-start text-center">
            <h2>All Products</h2>
        </div>
        <div class="col-md-9">
            <div class="tab-style-1">
                <div class="nav nav-tabs justify-content-md-end justify-content-center" id="product-tab" role="tablist">
                    <button type="button" class="nav-item nav-link active" id="new-all-tab" data-bs-toggle="tab" data-bs-target="#new-all" role="tab" aria-controls="new-all" aria-selected="true">
                        <span class="nav-text">All</span>
                    </button>
                    @foreach ($category as $value)
                    <button type="button" class="nav-item nav-link" id="new-{{ $value->id }}-tab" data-bs-toggle="tab" data-bs-target="#new-{{ $value->id }}" role="tab" aria-controls="new-{{ $value->id }}" aria-selected="false">
                        <span class="nav-text">{{$value->category}}</span>
                    </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="product-tab-content">
                <div class="tab-pane fade show active" id="new-all" role="tabpanel" aria-labelledby="new-all-tab">
                    <div class="row">
                        @for ($i = 0; $i < count($product); $i++)
                        <div class="col-lg-3 col-sm-6 mb--45">
                            <div class="ft-product HTfadeInUp">
                                <div class="product-inner">
                                    <div class="product-image">
                                        @php
                                            $img = unserialize($product[$i]->img);
                                        @endphp
                                        <figure class="product-image--holder">
                                            <img src="{{ asset('images/'.$img[0]) }}" alt="Product">
                                        </figure>
                                        <a href="{{ url('/product-detail') }}/{{ $product[$i]->id }}" class="product-overlay"></a>
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
                                        @php
                                            $name = App\Category::findOrFail($product[$i]->category);
                                        @endphp
                                        <div class="product-category">
                                            <a href="{{ url('/product-detail') }}/{{ $product[$i]->id }}">{{$name->category}}</a>
                                        </div>
                                        <h3 class="product-title"><a href="{{ url('/product-detail') }}/{{ $product[$i]->id }}">{{$product[$i]->name}}</a></h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                        @if (count($product))
                        {{ $product->links('livewire-pagitation-product-link') }}
                        @endif
                    </div>
                    <div class="col-12 text-center" style="margin-top: 50px">
                        <a href="{{url('/product-catalog')}}" class="btn btn-white btn-sm" >More Product</a>
                    </div>
                </div>
                @foreach ($category as $value)
                <div class="tab-pane fade" id="new-{{$value->id}}" role="tabpanel" aria-labelledby="new-{{$value->id}}-tab">
                    <div class="row">
                        @php
                            $productsplit = App\Product::where('category', $value->id)->paginate(4);
                        @endphp
                        @foreach ($productsplit as $item)
                        <div class="col-lg-3 col-sm-6 mb--45">
                            <div class="ft-product HTfadeInUp">
                                <div class="product-inner">
                                    <div class="product-image">
                                        @php
                                            $img = unserialize($item->img);
                                        @endphp
                                        <figure class="product-image--holder">
                                            <img src="{{ asset('images/'.$img[0]) }}" alt="Product">
                                        </figure>
                                        <a href="{{ url('/product-detail') }}/{{ $item->id }}" class="product-overlay"></a>
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
                                    <div class="product-info">
                                        <div class="product-category">
                                            <a href="{{ url('/product-detail') }}/{{ $item->id }}">{{$value->category}}</a>
                                        </div>
                                        <h3 class="product-title"><a href="{{ url('/product-detail') }}/{{ $item->id }}">{{$item->name}}</a></h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if (count($productsplit))
                    {{ $productsplit->links('livewire-pagitation-product-link') }}
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
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
