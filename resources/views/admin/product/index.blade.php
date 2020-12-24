
@extends('admin.layouts.admin')
@section('title')
    <title>Quản lý sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admin/product/css/list.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content_header',['name'=>'Sản phẩm','key'=>'danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (count($errors) >0)

                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif

                    @if (session('notification'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong>  {{ session('notification') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif
                    <!-- Search form -->

                    <div class="col-md-12">
                        <div class="row">
                            <div class="md-form active-cyan active-cyan-2 mb-3 col-md-11">

                                <input class="form-control m-2" type="text" id="search" name ="search" placeholder="Search"
                                       aria-label="Search" url-temp="">
                            </div>
                            <div class="col-md-1">
                                <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Thêm mới</a>
                            </div>

                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sảm phẩm </th>
                                <th scope="col">Giá </th>
                                <th scope="col">Diện tích sàn (m2)</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Khu vực</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td style="max-width: 300px;">{{ $item->name }}</td>
                                    <td>{{ $item->price}} đồng</td>
                                    <td> {{ $item->floor_area  }}</td>
                                    <td>
                                        <img class="img-pro" src="{{asset($item->product_image_path)}}" alt="image">
                                    </td>
{{--                                    optional trả về null nếu data trả về không là object . thay vì trả về error .--}}
{{--                                    optional được chạy khi không tìm thấy category của product tương ứng--}}
                                    <td>{{optional($item->categories)->name}}</td>
                                    <td>{{optional($item->locations)->name}}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{route('products.edit',['id' => $item->id])}}" class="btn
                                        btn-default">Sửa</a>
                                        <a href="{{route
                                        ('products.delete',
                                        ['id' => $item->id])}}"
                                           class="btn_delete
                                         btn
                                        btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="col-md-12">
                            {{ $products->links("pagination::bootstrap-4") }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('admin/product/js/list.js')}}"></script>
    <script>
         $(document).ready(function(){
        $(document).on('click','.btn_delete',function(e){
            e.preventDefault();
            let urlDelete = $(this).attr('href');
            let that = $(this);
            Swal.fire({
                title: 'Bạn có muốn xóa sản phẩm?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'GET',
                        url:urlDelete,
                        // data:'_token = <?php echo csrf_token() ?>',
                        success:function(data) {
                            // $("#msg").html(data.msg);
                            that.parent().parent().remove();
                            Swal.fire(
                                'Đã xóa thành công!',
                                'Sản phẩm đã được xóa !',
                                'success'
                            )
                        }
                    });
                }
            })
        });
    });
    </script>
@endsection
