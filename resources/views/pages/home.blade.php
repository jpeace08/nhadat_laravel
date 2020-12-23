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
                            <li class="item active">Nổi bật</li>
                            <li class="item">Tin tức</li>
                            <li class="item">Tư vấn</li>
                            <li class="item">Phong thủy</li>
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
                        <ul class="news">
                            <li class="item"><a href="#">Đánh giá dự án Cát Tường Pearl</a></li>
                            <li class="item"><a href="#">Đánh giá dự án Cát Tường Pearl</a></li>
                            <li class="item"><a href="#">Đánh giá dự án Cát Tường Pearl</a></li>
                            <li class="item"><a href="#">Đánh giá dự án Cát Tường Pearl</a></li>
                            <li class="item"><a href="#">Đánh giá dự án Cát Tường Pearl</a></li>
                            <li class="item"><a href="#">Đánh giá dự án Cát Tường Pearl</a></li>
                        </ul>
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
                    <div class="product-item">
                        <a href="{{ asset('frontend/pages/detail.html') }}">
                            <img src="{{ asset('frontend/assets/images/home1.jpg') }}" alt="Product Name" class="thumb">
                        </a>
                        <div class="ml">
                            <a title="Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi" href="" class="description">Cho thue văn
                                phòng hiện đại, sang trọng, đầy đủ tiện nghi Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi</a>
                            <div class="meta">
                                <span class="price">230 nghìn/m²/tháng</span>
                                <span class="floor-area">118 m²</span>
                            </div>
                            <a href="#" class="location">Cầu Giấy, Hà Nội</a href="#">
                            <div style="display: flex;">
                                <span class="moment">Hôm nay</span>
                                <i class="far fa-heart"></i>
                            </div>
                        </div>
                    </div>

                    <div class="product-item">
                        <a href="{{ asset('frontend/pages/detail.html') }}">
                            <img src="{{ asset('frontend/assets/images/home1.jpg') }}" alt="Product Name" class="thumb">
                        </a>
                        <div class="ml">
                            <a title="Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi" href="" class="description">Cho thue văn
                                phòng hiện đại, sang trọng, đầy đủ tiện nghi Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi</a>
                            <div class="meta">
                                <span class="price">230 nghìn/m²/tháng</span>
                                <span class="floor-area">118 m²</span>
                            </div>
                            <a href="#" class="location">Cầu Giấy, Hà Nội</a href="#">
                            <div style="display: flex;">
                                <span class="moment">Hôm nay</span>
                                <i class="far fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <a href="{{ asset('frontend/pages/detail.html') }}">
                            <img src="{{ asset('frontend/assets/images/home1.jpg') }}" alt="Product Name" class="thumb">
                        </a>
                        <div class="ml">
                            <a title="Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi" href="" class="description">Cho thue văn
                                phòng hiện đại, sang trọng, đầy đủ tiện nghi Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi</a>
                            <div class="meta">
                                <span class="price">230 nghìn/m²/tháng</span>
                                <span class="floor-area">118 m²</span>
                            </div>
                            <a href="#" class="location">Cầu Giấy, Hà Nội</a href="#">
                            <div style="display: flex;">
                                <span class="moment">Hôm nay</span>
                                <i class="far fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <a href="{{ asset('frontend/pages/detail.html') }}">
                            <img src="{{ asset('frontend/assets/images/home1.jpg') }}" alt="Product Name" class="thumb">
                        </a>
                        <div class="ml">
                            <a title="Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi" href="" class="description">Cho thue văn
                                phòng hiện đại, sang trọng, đầy đủ tiện nghi Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi</a>
                            <div class="meta">
                                <span class="price">230 nghìn/m²/tháng</span>
                                <span class="floor-area">118 m²</span>
                            </div>
                            <a href="#" class="location">Cầu Giấy, Hà Nội</a href="#">
                            <div style="display: flex;">
                                <span class="moment">Hôm nay</span>
                                <i class="far fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <a href="{{ asset('frontend/pages/detail.html') }}">
                            <img src="{{ asset('frontend/assets/images/home1.jpg') }}" alt="Product Name" class="thumb">
                        </a>
                        <div class="ml">
                            <a title="Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi" href="" class="description">Cho thue văn
                                phòng hiện đại, sang trọng, đầy đủ tiện nghi Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi</a>
                            <div class="meta">
                                <span class="price">230 nghìn/m²/tháng</span>
                                <span class="floor-area">118 m²</span>
                            </div>
                            <a href="#" class="location">Cầu Giấy, Hà Nội</a href="#">
                            <div style="display: flex;">
                                <span class="moment">Hôm nay</span>
                                <i class="far fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

@endsection
