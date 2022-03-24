@extends('layouts.master')
@section('headerName', 'About us')
@section('content')
<div  class="main-content-wrapper">
    <div class="text-center mt-5 py-4" style="background-color: rgb(253, 237, 201)">CORE VALUE</div>
    <div class="shop-page-wrapper ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop-products">
                        <div class="row">
                            @foreach ($core as $item)
                                <div class="col-xl-3 col-lg-4 col-sm-6 mb--50">
                                    <div class="ft-product">
                                        <div class="product-inner">
                                            <div class="product-info">
                                                <div class="product-category">
                                                    <h3><b>{{ $item->name }}</b></h3>
                                                </div>
                                                <hr class="delimeter">
                                                <p style="text-align: justify">
                                                    @php
                                                        echo $item->text;
                                                    @endphp
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection