@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh Sách <a href="{{ route('admin.vendor.create') }}" type="button" class="btn bg-olive btn-flat margin">Thêm mới</a>
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
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>SĐT</th>
                                <th>email</th>
                                <th>địa chỉ</th>
                                <th>Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key =>$item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{$key +1}}</td>
                                    <td>{{$item->name}}
                                    </td>
                                    <td>{{$item->phone}}</td>
                                    <td> {{$item->email}}</td>
                                    <td> {{$item->address}}</td>
                                    <td>
                                        <a href="{{ route('admin.vendor.edit', ['id' => $item->id ]) }}" class="btn bg-purple btn-flat margin">
                                            <i class="fa fa-pencil-square-o"></i></a>
                                        <button onclick="deleteItem('vendor',{{ $item->id }})" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
