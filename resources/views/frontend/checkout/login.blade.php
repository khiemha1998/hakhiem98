
@extends('frontend.layouts.main')
@section('content')

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đăng nhập &amp; Đăng kí</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb lagin-and-register-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
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
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> Đăng Nhập </h4>
                            </a>
                            <a data-toggle="tab" href="#lg2">
                                <h4> Đăng Kí </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        @if (session('msg'))
                                            <div class="form-group has-feedback"><a href="#" style="color: red;">{{ session('msg') }}</a></div>
                                        @endif
                                        <form action="{{route('shop.loginCustomers')}}" method="post">
                                            @csrf
                                            <div class="login-input-box">
                                                <input type="email" name="email_account" placeholder="Tài khoản">
                                                <input type="password" name="password_account" placeholder="Mật khẩu">
                                            </div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Nhớ</label>
                                                    <a href="#">Quên mật khẩu?</a>
                                                </div>
                                                <div class="button-box">
                                                    <button class="login-btn btn" type="submit"><span>Đăng nhập</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{route('shop.addcustomers')}}" method="POST">
                                            @csrf
                                            <div class="login-input-box">
                                                <input type="text" name="customer_name" placeholder="Tài khoản">
                                                <input name="customer_email" placeholder="Email" type="email">
                                                <input type="password" name="customer_password" placeholder="Mật khẩu">
                                                <input name="customer_phone" placeholder="Điện thoại" type="number">
                                            </div>
                                            <div class="button-box">
                                                <button class="register-btn btn" type="submit"><span>Đăng kí</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->


@endsection








