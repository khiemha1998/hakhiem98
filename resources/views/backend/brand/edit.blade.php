@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa Brand <a href="{{route('admin.brand.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Brand</h3>
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
                    <form role="form" action="{{route('admin.brand.update', ['id' => $data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input value="{{$data->name}}" type="text" class="form-control" id="title" name="name" placeholder="Nhập tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi ảnh</label>
                                <input type="file" id="new_image" name="image_new">
                                <!-- Hiển thị ảnh cũ -->
                                <br>
                                <img src="{{asset($data->image)}}" alt="" width="250">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tùy chỉnh liên kết Url</label>
                                <input value="{{$data->website}}" type="text" class="form-control" id="url" name="website" placeholder="Url">
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active" {{ ($data->is_active == 1)? 'checked' : '' }}> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" >Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" value="{{ $data->position }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor1" name="description" class="form-control" rows="10" placeholder="Enter ...">{{$data->description}}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

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

@section('script')
    <script type="text/javascript">
        $(function () {
            //setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height= 500; //thiết lập chiều cao
            var _ckeditor = CKEDITOR.replace('editor2');
            _ckeditor.config.height= 200; //thiết lập chiều cao
        });
    </script>
@endsection
