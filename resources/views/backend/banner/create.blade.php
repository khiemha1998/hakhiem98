
@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới Banner <a href="{{route('admin.banner.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Banner</h3>
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
                    <form role="form" action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh</label>
                                <input type="file" id="image" name="image">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tùy chỉnh liên kết Url</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Target</label>
                                        <select class="form-control" name="target">
                                            <option value="_blank">_blank</option>
                                            <option value="_self">_self</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loại</label>
                                        <select class="form-control" name="type">
                                            <option value="1">Slide</option>
                                            <option value="2">Background</option>
                                            <option value="3">Banner right</option>
                                            <option value="4">Banner left</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position"  placeholder="0">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        @if ($errors->has('position'))
                                            <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('position') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor1" name="description" class="form-control" rows="10" placeholder="Enter ..."></textarea>
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
