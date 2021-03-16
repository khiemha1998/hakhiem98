
@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Update nhà cung cấp <a href="{{route('admin.vendor.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin nhà cung cấp</h3>
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
                    <form role="form" action="{{ route('admin.vendor.update',['id'=>$data->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên nhà cung cấp</label>
                                <input value="{{ $data->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input  value="{{ $data->email }}" type="email" class="form-control" id="email" name="email" placeholder="Nhập tên ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input  value="{{ $data->phone }}" type="number" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh mới</label>
                                <input type="file" id="new_image" name="new_image">
                                <br>
                                <img src=" {{ asset($data->image) }}" alt="" width="150">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Website</label>
                                <input value="{{ $data->url }}" type="text" class="form-control" id="url" name="url" placeholder="Url">
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <textarea id="editor1" name="address" class="form-control" rows="3" placeholder="">{{ $data->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input   type="number" class="form-control" id="position" name="position" value="{{ $data->position }}" >
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active" {{  $data->is_active ==1 ? 'checked' : '' }}> Trạng thái hiển thị
                                </label>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Lưu</button>
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

<script>
    $(function () {
        $('#example1').DataTable()
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
{{--create.blade.php--}}
{{--Đang hiển thị create.blade.php.--}}
