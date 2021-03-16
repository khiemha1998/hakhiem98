@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh sách Tin tức
            <small><a href="{{route('admin.blog.create')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Thêm mới</a></small>
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
                                <th>TT</th>
                                <th>Tiêu đề</th>
                                <th>Hình ảnh</th>
                                <th>Loại</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hàng động </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{$item->id}}"> <!-- thêm class cho dòng -->
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{asset($item->image)}}" alt="" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->position}}</td>
                                    <td>{{ ($item->is_active ==1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.blog.edit', ['id' => $item->id])}}" class="btn bg-purple btn-flat margin">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <button onclick="deleteItem('blog', {{$item->id }})" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>


                                </tr>
                            @endforeach
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
        });
    </script>
@endsection
