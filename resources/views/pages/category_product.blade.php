@extends('layouts.index')
@section('title')
    <title>Danh mục</title>
@endsection
@section('content')

    <section class="grey-bg mx-3">
        <div class="container mx-auto products-container">

            <div class="row">
                <h4 class="col-sm-12">Category Name</h4>

            </div>
            <div class="row">
                <div class="col-sm-9">
                @foreach ($category_pro->products as $item)
                    <div class="products _l">
                        <div class="product-item">
                            <a href="{{ asset($item->product_image_path) }}">
                                <img src="../assets/images/home1.jpg" alt="Product Name" class="thumb">
                            </a>
                            <div class="ml">
                                <a title="Cho thue văn phòng hiện đại, sang trọng, đầy đủ tiện nghi" href="{{ asset($item->product_image_path) }}" class="description">Cho
                                   {{ $item->name }}</a>
                                <div class="meta">
                                    <span class="price">{{ number_format($item->price,0,'','.') }} đ/m²/tháng</span>
                                    <span class="floor-area">118 m²</span>
                                </div>
                                <a href="#" class="location">Cầu Giấy, Hà Nội</a href="#">
                                <div class="short-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero delectus deserunt
                                    ab! Totam dolores quo recusandae a, voluptatem enim repudiandae cupiditate, quod aut eos, ratione optio
                                    maiores error nisi labore!</div>
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
