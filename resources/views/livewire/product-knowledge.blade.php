                <div class="col-lg-9 mb-md--50">
                    <div class="row">
                        @foreach ($data as $item)
                        <div class="col-12 mb--45">
                            <article class="blog format-standard">
                                <div class="blog__inner">
                                    <figure class="blog__media">
                                        <div class="image">
                                            @php
                                            $img = unserialize($item->img);
                                            @endphp
                                            <a href="{{url('detail-knowledge/'.$item->id)}}" >
                                            @if ($img == null)
                                            <img src="{{asset('assets/img/blog/blog-06.jpg')}}" alt="Blog" class="w-100">
                                            @else
                                            <img src="{{asset('images/'.$img[0])}}" alt="Blog" class="w-100">
                                            @endif
                                            </a>
                                        </div>
                                    </figure>
                                    <div class="blog__info">
                                        <h2 class="blog__title"><a href="{{url('detail-knowledge/'.$item->id)}}">{{$item->title}}</a></h2>
                                        <div class="blog__meta">
                                            <span class="posted-on">{{date('d M, Y', strtotime($item->created_at))}}</span>
                                        </div>
                                        <div class="blog__desc">
                                            {!! Str::substr($item->article, 0, 200) !!}..............
                                        </div>
                                        <a href="{{url('detail-knowledge/'.$item->id)}}" class="read-more-btn">Read More</a>
                                    </div>
                                </div>
                            </article>                               
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>