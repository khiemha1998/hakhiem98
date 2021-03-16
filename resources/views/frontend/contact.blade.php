@extends('frontend.layouts.main')

@section('contact')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Liên Hệ</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- Page Conttent -->
<main class="page-content section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-12">
                <div class="contact-form">
                    <div class="contact-form-info">
                        <div class="contact-title">
                            <h2>Gửi Liên Hệ Cho Chúng Tôi</h2>
                        </div>
                        @if (session('msg'))
                            <div class="form-group has-feedback"><a href="#" style="color: orange;">{{ session('msg') }}</a></div>
                        @endif
                        <form id="contact-form" action="{{ route('shop.postContact') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="contact-page-form">
                                <div class="contact-input">
                                    <div class="contact-inner">
                                        <input name="name" type="text" placeholder="Name *">
                                    </div>
                                    <div class="contact-inner">
                                        <input name="email" type="email" placeholder="Email *">
                                    </div>
                                    <div class="contact-inner">
                                        <input name="phone" type="text" placeholder="Phone *">
                                    </div>
                                    <div class="contact-inner contact-message">
                                        <textarea name="content" placeholder="Message *"></textarea>
                                    </div>
                                </div>
                                <div class="contact-submit-btn">
                                    <button type="submit"  class="submit-btn"  id="btn-send">Gửi Email</button>
{{--                                    <p class="form-messege"></p>--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="contact-infor">
                    <div class="contact-title">
                        <h3>Liên Hệ Vói Chúng Tôi</h3>
                    </div>
                    <div class="contact-dec">
                        <p>Ruiz nhận đặt hàng trực tuyến và giao hàng tận nơi, chưa hỗ trợ mua và nhận hàng trực tiếp tại văn phòng hoặc trung tâm xử lý đơn hàng</p>
                    </div>
                    <div class="contact-address">
                        <ul>
                            <li>Địa chỉ :{{ $setting->address }}</li>
                            <li>Email: {{ $setting->email }}</li>
                            <li>Phone: {{ $setting->phone }}</li>
                        </ul>
                    </div>
                    <div class="work-hours">
                        <h5>Thời Gian Hoạt Động</h5>
                        <p><strong>Thứ Hai &ndash; Chủ Nhật</strong>: &nbsp;08AM &ndash; 22PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--// Page Conttent -->
@endsection

{{--@section('script')--}}
{{--    <script>--}}
{{--        $('#btn-send').click(function () {--}}
{{--            $('.contact-form').html('<p  style="color: red">Gửi thành công!</p>');--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
