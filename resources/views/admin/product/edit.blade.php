
@extends('admin.layouts.admin')
@section('title')
    <title>Sửa danh mục</title>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset("admins/product/edit/edit.css")}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content_header',['name'=>'product','key'=>'edit'])
        <div class="content">
            <div class="container-fluid">

                <div class="row ml-5">
                    <div class="col-md-8">
                        @if (count($errors) >0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{ $err }} <br>
                                @endforeach
                            </div>
                        @endif
                        @if (session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}
                            </div>
                        @endif
                        <form action = "{{route('products.update',['id'=>$product->id])}}" method="POST"
                              enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" name = "name" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="" placeholder="Nhập tên sản phẩm"
                                        value="{{$product->name}}"
                                >

                            </div>
                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <input type="text"  name = "desc" class="form-control"
                                       id="exampleInputEmail1"
                                       aria-describedby="" placeholder="Nhập mô tả ngắn"
                                        value="{{$product->desc }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Diện tích sàn</label>
                                <input type="number" name = "floor_area" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="" placeholder="Nhập giá bán"
                                        value="{{$product->floor_area}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <input type="file" name = "product_image" class="form-control-file" id="exampleInputEmail1"
                                       aria-describedby=""  >
                                <div class="col-md-12">
                                    <div class="row">
                                        <img width="150" class="image_feature mt-3" src="{{asset($product->product_image_path)}}" alt="">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh chi tiết</label>
                                <input type="file" name = "related_image[]" multiple class="form-control-file"
                                       id="exampleInputEmail1"
                                       aria-describedby="" placeholder="">
                                <div class="col-md-12 mt-3">
                                    <div class="row">
                                        @foreach($product->product_images as $item)
                                            <div class="col-md-3">
                                                <img width="150"  class="image_detail" src="{{asset($item->image_path)}}"
                                                      alt="">
                                                <a href="{{route('products.delete_image_pro',['id'=>$item->id])}}"><i
                                                        class="glyphicon
                                                glyphicon-trash"></i>
                                                    <p>Xóa ảnh</p></a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Giá bán</label>
                                <input type="number" name = "price" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="" placeholder="Nhập giá bán"
                                        value="{{$product->price}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Chọn danh mục</label>
                                <select class="form-control " name ="category_id">
                                    <option value="">Chọn khu vực </option>\
                                    @foreach ($categories as $item)
                                        <option

                                        @if ($product->category_id == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn khu vực</label>
                                <select class="form-control " name ="location_id">
                                    <option value="">Chọn khu vực </option>\
                                    @foreach ($locations as $item)
                                        <option
                                        @if ($product->location_id == $item->id)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nội dung</label>
                                <textarea name="product_content" class="ckeditor form-control " id="editor1">
                                    {{$product->content}}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mb-4">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('js')
 {{-- Thêm thư viện CKEDITOR bằng cdn --}}
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('.ckeditor').ckeditor();
        });
    </script>

@endsection
