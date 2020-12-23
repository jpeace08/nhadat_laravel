
@extends('admin.layouts.admin')
@section('title')
    <title>Trang quản trị</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content_header',['name'=>'vai trò','key'=>'list'])
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
                        <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">Thêm mới</a>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Display name</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->display_name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{route('roles.edit',['id' => $item->id])}}" class="btn btn-default">Sửa</a>
                                        <a href="{{route('roles.delete',['id' => $item->id])}}" class="btn_delete btn btn-danger">Xóa</a>
                                    </td>
                                     </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="col-md-12">
                            {{ $roles->links("pagination::bootstrap-4")}}
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
                title: 'Bạn có muốn xóa vai trò?',
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
                                'Vai trò đã được xóa !',
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
