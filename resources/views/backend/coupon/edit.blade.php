
@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Sửa Mã Giảm Giá <a href="{{route('admin.coupon.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mã Giảm Giá</h3>
                    </div>
                    @if ($errors->any())

                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Lỗi!</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.coupon.update',['id'=>$data->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" class="form-control" id="coupon_name" name="name" placeholder="Nhập tên " value="{{$data->name}}">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Code </label>
                                <input type="text" class="form-control" id="coupon_code" name="code" placeholder="Nhập Code" value="{{$data->code}}">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng mã</label>
                                <input type="number" class="form-control" id="coupon_time" name="quantity" placeholder="Nhập Code" value="{{$data->quantity}}">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>

                            <div class="form-group">
                                <label>Tính năng mã</label>
                                <select class="form-control" name="type">
                                    <option value="0">--Chon--</option>
                                    <option value="1">Giảm theo phần trăm</option>
                                    <option value="2">Giảm theo tiền</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập số % hoặc tiền giảm</label>
                                <input type="number" class="form-control" id="coupon_number" name="percent" placeholder="Nhập Code" value="{{$data->percent}}">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection


@section(' ')
    <script type="text/javascript" >
        $(function () {
            //set up textarea suwr dungj plugin ckeditor
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height = 500;//Thiet lap chieu cao
            var _ckeditor = CKEDITOR.replace('editor2');
            _ckeditor.config.height = 200;//Thiet lap cieu cao
        })
    </script>
@endsection
{{--create.blade.php--}}
{{--Đang hiển thị create.blade.php.--}}
