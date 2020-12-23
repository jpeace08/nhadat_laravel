
@extends('admin.layouts.admin')
@section('title')
    <title>Quản lý sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/list/list.css')}}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('admin.partials.content_header',['name'=>'Slider','key'=>'danh sách'])
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
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                    <div class="col-md-12">
                        <a href="{{ route('sliders.create') }}" class="btn btn-success float-right m-2">Thêm mới</a>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh </th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sliders as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{!! $item->desc!!}</td>
                                    <td>
                                        <img width="150" class="img-pro" src="{{asset($item->slider_image)}}" alt="image">
                                    </td>
                                    {{--                                    optional trả về null nếu data trả về không là object . thay vì trả về error .--}}
                                    {{--                                    optional được chạy khi không tìm thấy category của product tương ứng--}}
{{--                                    <td>{{optional($item->categories)->name}}</td>--}}
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{route('sliders.edit',['id' => $item->id])}}" class="btn
                                        btn-default">Sửa</a>
                                        <a href="{{route
                                        ('sliders.delete',
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
                            {{ $sliders->links("pagination::bootstrap-4") }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                                'Slider đã được xóa !',
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
