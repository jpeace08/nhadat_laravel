
@extends('admin.layouts.admin')
@section('title')
    <title>Thêm mới danh mục</title>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset("admins/slider/add/add.css")}}">
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content_header',['name'=>'Slider','key'=>'Add'])
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
                        <form action = "{{route('sliders.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên slider</label>
                                <input type="text" name = "name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="" placeholder="Nhập tên slider"
                                       value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả slider</label>
                                <textarea name="desc" class=" form-control
@error('description')is-invalid @enderror" id="editor1"> {{old('desc')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh Slider</label>
                                <input type="file" name = "slider_image"  class="form-control-file"
                                       value="{{old('slider_image')}}">
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
@endsection
