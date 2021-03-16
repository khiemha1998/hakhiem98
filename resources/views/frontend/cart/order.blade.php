@extends('frontend.layouts.main')
@section('order')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đặt Hàng</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb checkout-page">
        <div class="container">

            <!-- checkout-details-wrapper start -->
            <div class="checkout-details-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <!-- billing-details-wrap start -->
                        <div class="billing-details-wrap">
                            <form action="{{ route('shop.cart.postOrder') }}" method="POST">
                                @csrf
                                <h3 class="shoping-checkboxt-title">Chi tiết thanh toán</h3>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Họ Và Tên <span class="required">*</span></label>
                                            <input type="text" name="fullname">
                                        </p>
                                    </div>

                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Số điện thoại<span class="required">*</span></label>
                                            <input type="number" name="phone">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Email  <span class="required">*</span></label>
                                            <input type="email" name="email">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Địa chỉ nhận hàng <span class="required">*</span></label>
                                            <input type="text" name="address">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row m-0">
                                            <label>Ghi chú<span class="required">*</span></label>
                                            <textarea name="note" class="checkout-mess" rows="2" cols="5"></textarea>
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p>
                                            <input type="checkbox" name="Email address ">
                                            <label>Tôi đã chấp nhận chính sách mua hàng <span class="required">*</span></label>

                                        </p>
                                    </div>
                                </div>
                                <button class="btn " type="submit">Tiến hành đặt hàng</button>
                            </form>
                        </div>
                        <!-- billing-details-wrap end -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- your-order-wrapper start -->
                        <div class="your-order-wrapper">
                            <h3 class="shoping-checkboxt-title">Your Order</h3>
                            <!-- your-order-wrap start-->
                            <div class="your-order-wrap">
                                <!-- your-order-table start -->
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product-name">Sản Phẩm</th>
                                            <th class="product-total">Tổng </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{$totalCount}}
                                            </td>
                                            <td class="product-total">
                                                @if($coupon_session = Session::get('total_coupon'))
                                                    {{number_format($coupon_session['total_final'],0,',','.')}}đ

                                                @else
                                                    {{$totalPrice}}đ
{{--                                                    {{number_format($totalPrice,0,',','.')}}đ--}}
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- your-order-table end -->

                                <!-- your-order-wrap end -->
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <!-- ACCORDION START -->
                                        <h5>Chuyển Khoản trực tiếp</h5>
                                        <div class="payment-content">
                                            <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi tiền đã hết trong tài khoản của chúng tôi.</p>
                                        </div>
                                        <!-- ACCORDION END -->
                                        <!-- ACCORDION START -->
                                        <h5>Thanh toán séc</h5>
                                        <div class="payment-content">
                                            <p>Vui lòng gửi séc của bạn đến Tên cửa hàng, Phố cửa hàng, Thị trấn cửa hàng, Bang / Hạt cửa hàng, Mã bưu điện cửa hàng.</p>
                                        </div>
                                        <!-- ACCORDION END -->
                                        <!-- ACCORDION START -->
                                        <h5>PayPal</h5>
                                        <div class="payment-content">
                                            <p>Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng của mình nếu bạn không có tài khoản PayPal.</p>
                                        </div>
                                        <!-- ACCORDION END -->
                                    </div>
                                    <div class="order-button-payment">

                                    </div>
                                </div>
                                <!-- your-order-wrapper start -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- checkout-details-wrapper end -->
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
