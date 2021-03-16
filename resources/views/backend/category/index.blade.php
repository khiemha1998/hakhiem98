@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh sách thư mục
            <a href="{{ route('admin.category.create') }}"  class="btn btn-success"><i class="fa fa-list"></i>Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td>TT</td>
                                <td>Danh mục</td>
                                <td>Hình ảnh</td>
                                <td>Danh mục cha</td>
                                <td>Vị trí</td>
                                <td>Trạng thái</td>
                                <td>Loại</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!--Thêm Class cho bảng-->
                                    <td>{{$key+1}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                    @if($item->image) <!--Kiểm tra hình ảnh có tồn tại -->
                                        <img src="{{asset($item->image)}}" width="50" height="50" alt="">
                                        @endif
                                    </td>
                                    <td>{{$item->parent_id}}</td>
                                    <td>{{$item->position}}</td>
                                    <td>{{($item->is_active ==1) ? 'Hiển thị' : 'Ẩn'}}</td>
                                    <td>{{($item->type == 1) ? 'Tin Tức' : 'Sản Phẩm'}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.category.edit',['id'=>$item->id]) }}" class="btn bg-purple btn-flat margin">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <button onclick="deleteItem('category','{{ $item->id }}')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('script')
    <script>
        $(function () {
            $('#example1').DataTable();
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
