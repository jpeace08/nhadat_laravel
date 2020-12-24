@extends('layouts.index')
@section('title')
    <title>Khu vực</title>
@endsection
@section('content')

    <section class="grey-bg mx-3">
        <div class="container mx-auto products-container">

            <div class="row">
                <h4 class="col-sm-12 title-car">{{ $location_pro->name }}</h4>

            </div>
            <div class="row">
                <div class="col-sm-9">
                @foreach ($location_pro->products as $item)
                    <div class="products _l">
                        <div class="product-item">
                            <a href="{{ route('front.product.detail',['slug'=>$item->slug])}}">
                                <img src="{{ asset($item->product_image_path) }}" alt="Product Name" class="thumb">
                            </a>
                            <div class="ml">
                                <a title="Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi" href="{{ route('front.product.detail',['slug'=>$item->slug])}}" class="title-name">
                                   {{ $item->name }}</a>
                                <div class="meta">
                                    <span class="price">{{ $item->price }} </span>
                                    <span class="floor-area">118 m²</span>
                                </div>
                                <a href="{{ route('front.product.detail',['slug'=>$item->slug])}}" class="location">{{ $item->locations->name }}</a href="#">
                                <div class="short-content description">{{ $item->desc }}</div>
                                <div style="display: flex;">
                                    <span class="moment">Hôm nay</span>
                                    <i class="far fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
                <div class="col-sm-3">
                    <aside class="filter">
                        <div class="ft">
                            <span>Lọc theo khoảng giá</span>
                            <ul>
                                <li class="pr">1-3 triệu</li>
                                <li class="pr">1-3 triệu</li>
                                <li class="pr">1-3 triệu</li>
                                <li class="pr">1-3 triệu</li>
                                <li class="pr">1-3 triệu</li>
                            </ul>
                        </div>
                        <div class="ft">
                            <span>Lọc theo diện tích</span>
                            <ul>
                                <li class="pr">1-3 triệu</li>
                                <li class="pr">1-3 triệu</li>
                                <li class="pr">1-3 triệu</li>
                                <li class="pr">1-3 triệu</li>
                                <li class="pr">1-3 triệu</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>

        </div>
    </section>
@endsection
