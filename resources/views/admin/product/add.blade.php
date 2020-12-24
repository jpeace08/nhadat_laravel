
@extends('admin.layouts.admin')
@section('title')
    <title>Thêm sản phẩm</title>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset("admins/product/add/add.css")}}">
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content_header',['name'=>'product','key'=>'add'])
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
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        <form action = "{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" name = "name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="" placeholder="Nhập tên sản phẩm"
                                value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <input type="text" name = "desc" class="form-control @error('desc') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="" placeholder="Nhập mô tả ngắn"
                                       value="{{old('desc')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Diện tích (m2)</label>
                                <input type="number" name = "floor_area" class="form-control @error('floor_area') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="" placeholder="Nhập diện tích sàn"
                                       value="{{old('floor_area')}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <input type="file" name = "product_image" class="form-control-file" id="exampleInputEmail1"
                                       >
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh liên quan</label>
                                <input type="file" name = "related_image[]" multiple class="form-control-file"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Giá bán</label>
                                <input type="text" name = "price" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="" placeholder="Nhập giá bán"
                                       value="{{old('price')}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Chọn danh mục</label>
                                <select class="form-control " name ="category_id">
                                    <option value="0">Chọn danh mục </option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn khu vực</label>
                                <select class="form-control " name ="location_id">
                                    <option value="">Chọn khu vực </option>
                                    @foreach ($locations as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nội dung</label>
                                <textarea name="product_content" value="{{old('product_content')}}" class="ckeditor form-control @error('product_content')
                                    is-invalid @enderror" id="editor1"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{asset("admins/product/add/add.js")}}"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}

    <script> CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });</script>
@endsection
