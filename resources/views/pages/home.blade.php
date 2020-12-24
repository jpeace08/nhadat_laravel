@extends('layouts.index')
@section('title')
    <title>Mua bán bất động sản</title>
@endsection
@section('content')


        <!-- Slider  -->

        <section>
            <div class="slider-block">
                <div class="container">
                    <div class="owl-carousel home-owl">
                        @if (isset($sliderImages))
                            @foreach ($sliderImages as $image)
                                <img src="{{ asset($image->slider_image) }}" alt="{{$image->desc}}" data-hash="">
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!--// Slider  -->
        <!-- news home  -->
        <section>
            <div class="container home-center">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav-sub">
                            @if (isset($categories))
                                @foreach ($categories as $category)
                                    <li class="item  {{$category->id == 1 ? 'active':''}}" 
                                        data-category-id={{$category->id}}
                                        data-category-slug={{$category->slug}}
                                        >
                                        {{$category->name}} 
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5">
                        <article class="detail-new">
                            <img src="{{ asset('frontend/assets/images/home.jpg') }}" alt="" class="thumb">
                            <a href="#" class="title">Tin tuc bat dong san noi bat nhat tuan qua</a>
                            <span class="moment">2 giờ trước</span>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <ul class="news"></ul>
                    </div>
                    <div class="col-sm-3">
                        <a href="#" class="ads"><img src="{{ asset('frontend/assets/images/home1.jpg') }}" alt="" class="ads_thumb"></a>
                    </div>
                </div>
            </div>
        </section>
        <!--// news home  -->

        <section class="grey-bg">
            <div class="container products-container">

                <div class="row">
                    <h2 class="col-sm-12">Bất động sản dành cho bạn</h2>

                </div>

                <div class="products">
                    @if (isset($latestProducts))
                        @foreach ($latestProducts as $product)
                            <div class="product-item">
                                {{-- <a href="{{route('front.product.detail', ['slug'=>$product->id]) }}"> --}}
                                    <a href="">
                                    <img src="{{ asset($product->product_image_path) }}" alt="{{$product->name}}" class="thumb">
                                </a>
                                <div class="ml">
                                    <a title="{{$product->desc}}" href="" class="description">Cho thue văn
                                        {{$product->desc}}
                                    </a>
                                    <div class="meta">
                                        <span class="price">{{number_format($product->price, 0,',', '.')}} nghìn/m²/tháng</span>
                                        <span class="floor-area">{{$product->floor_area}} m²</span>
                                    </div>
                                    <a href="#" class="location">{{$product->locations->name}}</a href="#">
                                    <div style="display: flex;">
                                        <span class="moment">{{date_format(date_create($product->created_at), 'd-M-yy')}}</span>
                                        <i class="far fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </section>

@endsection
