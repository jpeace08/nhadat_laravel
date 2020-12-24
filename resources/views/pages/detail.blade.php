@extends('layouts.index')
@section('title')
    <title>Sản phẩm chi tiết</title>
@endsection
@section('content')
 <!-- Detail Product  -->
  <div class="container detail-container">
    <div class="row">
        <div class="col-sm-8 main">

            <div class="slider-product">
                <div class="owl-carousel product-owl">

                    <img src="{{asset( $product->product_image_path) }}" alt="tada" srcset="" data-hash="#one">
                    @php
                        $arr=["#one","#two","#three","#four","#five","#six","#seven"];
                        $i=1;
                    @endphp
                    @foreach ($product->product_images as $item)

                        <img src="{{ asset($item->image_path) }}" alt="tada" srcset="" data-hash="{{ $arr[$i] }}">
                        <?php $i++; ?>
                    @endforeach

                    {{-- <img src="../assets/images/home.jpg" alt="tada" srcset="" data-hash="#two">
                    <img src="../assets/images/home.jpg" alt="tada" srcset="" data-hash="#three">
                    <img src="../assets/images/home.jpg" alt="tada" srcset="" data-hash="#four">
                    <img src="../assets/images/home.jpg" alt="tada" srcset="" data-hash="#five">
                    <img src="../assets/images/home.jpg" alt="tada" srcset="" data-hash="#six">
                    <img src="../assets/images/home.jpg" alt="tada" srcset="" data-hash="#seven"> --}}
                </div>
                <div class="sub-images">
                    @php
                    // $arr=["#one","#two","#three","#four","#five","#six","#seven"];
                    $j=0;
                @endphp
                    @foreach ($product->product_images as $item)
                        <a href="{{ $arr[$j] }}">
                            <img src="{{ asset($item->image_path) }}" alt="tada" srcset="">
                        </a>
                        <?php $j++; ?>
                    @endforeach
                </div>
            </div>

            <div class="navigation">
                <a href="" class="nav-link">Cho thuê</a><span>/</span>
                <a href="" class="nav-link">Cho thuê</a><span>/</span>
                <a href="" class="nav-link">Cho thuê</a><span>/</span>
                <a href="" class="nav-link">Cho thuê</a><span>/</span>
            </div>

            <div class="product-title">
                {{ $product->name }}
            </div>
            <div class="product-address">FLC Twin Towers, 265, Đường Cầu Giấy, Phường Dịch Vọng, Cầu Giấy, Hà Nội</div>
            <hr>

            <div class="product-short-detail">
                <span class="price">Thỏa thuận</span>
                <span class="floor-area">{{ $product->floor_area }} m²</span>
                <span class="save"><span class="text">Lưu tin</span><i class="far fa-heart"></i></span>
            </div>
            <hr>
            <div class="product-content">
                <h4>Thông tin mô tả</h4>
                <div class="des">
                    {{ $product->desc }}
                    <div class="contact">
                        LH: <span class="phone badge badge-primary">0965454545</span>
                    </div>

                    <div class="main">
                        {!!  $product->content !!}
                    </div>
                </div>
            </div>
            <div class="google-map">
                <h4>Xem trên bản đồ</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d251637.95196238213!2d105.6189045!3d9.779349!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1608675464509!5m2!1svi!2s"
                    width="800" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>

            </div>

            <hr>

            <h3>Các dự án liên quan</h3>

            <div class="relative-products owl-carousel">
                @foreach ($related_products as $item)
                <div class="product-item">
                    <a href="">
                        <img src="{{ asset($item->product_image_path) }}" alt="Product Name" class="thumb">
                    </a>
                    <div class="ml">
                        <a title="Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi" href="" class="description">
                            {{ $item->desc }}
                        </a>
                        <div class="meta">
                            <span class="price">{{ $item->price }} nghìn/m²/tháng</span>
                            <span class="floor-area">{{ $item->floor_area }}m²</span>
                        </div>
                        <a href="#" class="location">Cầu Giấy, Hà Nội</a href="#">
                        <div style="display: flex;">
                            <span class="moment">Hôm nay</span>
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>

        <div class="col-sm-3 sub">
            <div class="card-contact">
                <div class="avatar">
                    <img src="{{ asset('frontend/assets/images/avatar.jpg') }}" alt="" class="rounded-circle">
                </div>
                <div class="name">Jpeace08</div>
                <a href="" class="otherPost">Xem thêm <span class="number">24</span> tin khác</a>
                <div class="btn btn-success btn-block">0965454545</div>
                <div class="email">Gửi email</div>
            </div>
            <img class="fluid" src="{{ asset('frontend/assets/images/adsss.jpg') }}" alt="Ads">
        </div>
    </div>
</div>
<!--// Detail Product  -->

@endsection
