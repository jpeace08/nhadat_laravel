   <!-- Top navigation -->
<?php
// dd($categories);

// dd($locations);

?>
   <header class="nav-block">
    <div class="container">
        <div class="row">
            <ul class="col-sm-9">
                <li class="nav-item"><img src="{{ asset('frontend/assets/images/logosvg.svg') }}" alt="" class="logo"></li>
                <li class="nav-item"><a href="{{ route('front.home.index') }}">Trang chủ</a></li>
                <li class="nav-item"><a href="#">Giới thiệu</a></li>
                <li class="nav-item"><a href="#">Danh mục</a>

                    <div class="sub-menu-item">
                        @foreach ($categories as $item)
                            <p class=""><a href="{{ route('front.category.product',['slug'=>$item->slug]) }}"> {{ $item->name }} </a></p>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item"><a href="#">Khu vực</a>
                    <div class="sub-menu-item">
                        @foreach ($locations as $item)
                            <p class=""><a href="{{ route('front.location.product',['slug'=>$item->slug]) }}"> {{ $item->name }} </a></p>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item"><a href="#">Liên hệ</a></li>

            </ul>
            <ul class="col-sm-3">
                <li class="nav-item">
                    <a href="#favorite"><i class="fas fa-heart"></i></a>
                    <a href="#login" class="login"><i class="fas fa-user"></i></a>
                </li>
            </ul>
        </div>
    </div>
</header>

<!--// Top navigation -->
        <!-- Filter -->
        <div class="filter-block">
            <div class="container">
                <div class="row">
                    <ul class="col-sm-5 _s">
                        <li>
                            <div class="btn-group">
                                <span class="btn btn-outline-secondary action">Bán</span>
                                <span class="btn btn-outline-secondary action">Cho thuê</span>
                            </div>
                        </li>
                        <li>
                            <input type="text" class="search-box form-control" placeholder="Tìm kiếm địa điểm, khu vực">
                        </li>
                    </ul>
                    <ul class="col-sm-7 _f">
                        <li>
                            <div class="form-group">
                                <select  class="form-control" name="category_id_search" id="type">
                                    <option value="">--Danh mục--</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <select class="form-control" name="type" id="type">
                                    <option value="">--Khu vực--</option>
                                    @foreach ($locations as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <select class="form-control" name="type" id="type">
                                    <option value="">--Loại nhà đất--</option>
                                    <option>Căn hộ</option>
                                    <option>Trung cư</option>
                                    <option>Nhà riêng</option>
                                    <option value="">Văn phòng</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <span class="btn btn-secondary">Tìm kiếm</span>
                            <i class="resetFilter"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filter -->
