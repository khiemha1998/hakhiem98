@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
           Danh Sách Mã Giảm giá
            <a href="{{ route('admin.coupon.create') }}"  class="btn btn-success"><i class="fa fa-list"></i>Thêm Mã</a>
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
                                <td>Tên Mã</td>
                                <td>Code</td>
                                <td>Số lượng</td>
                                <td>Loại</td>
                                <td>Phần trăm</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!--Thêm Class cho bảng-->
                                    <td>{{$key+1}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{($item->type==1)? 'Giảm theo phần trăm' : "Giảm theo tiền"}}</td>
                                    <td>
                                      {{  $item->percent}}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.coupon.edit',['id'=>$item->id]) }}" class="btn bg-purple btn-flat margin">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <button onclick="deleteItem('coupon','{{ $item->id }}')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
