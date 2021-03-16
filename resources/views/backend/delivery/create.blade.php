
@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm Vận Chuyển <a href="{{route('admin.delivery.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Vận Chuyển </h3>
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
                    <form role="form" action="{{ route('admin.delivery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">


                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">

                                    <option value="">--Chọn tỉnh thành phố--</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                    <option value="">--Chọn quận huyện--</option>

                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                    <option value="">--Chọn xã phường--</option>
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Phí vận chuyển</label>
                                <input type="number" class="form-control" id="coupon_number" name="feeship" placeholder="Nhập Code">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary add_delivery">Thêm Phí Vận Chuyển</button>
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
    <script type="text/javascript" >
      $(document).ready(function (){
          // $('.add_delivery').click(function (){
          //       alert('ok')
          // })

          $('.choose').on('change',function(){
              var action = $(this).attr('id');
              var ma_id = $(this).val();
              var _token = $('input[name="_token"]').val();
              var result = '';
              // alert(action);
              //  alert(ma_tp);
              //   alert(_token);

              if(action=='city'){
                  result = 'province';
              }else{
                  result = 'wards';
              }
              $.ajax({
                  url : '{{url('/select-delivery')}}',
                  method: 'POST',
                  data:{action:action,ma_id:ma_id,_token:_token},
                  success:function(data){
                      $('#'+result).html(data);
                  }
              });
          });

      })
    </script>
@endsection
{{--create.blade.php--}}
{{--Đang hiển thị create.blade.php.--}}
