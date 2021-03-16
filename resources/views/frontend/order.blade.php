@extends('frontend.layouts.main')
@section('order')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Checkout Page</li>
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
                            <form action="#">
                                <h3 class="shoping-checkboxt-title">Chi tiết thanh toán</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Họ Và Tên <span class="required">*</span></label>
                                            <input type="text" name="First name">
                                        </p>
                                    </div>

                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Phone<span class="required">*</span></label>
                                            <input type="text" name="address">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Email address <span class="required">*</span></label>
                                            <input type="text" name="Email address ">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row m-0">
                                            <label>Ghi chú<span class="required">*</span></label>
                                            <textarea  class="checkout-mess" rows="2" cols="5"></textarea>
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p>
                                            <input type="checkbox" name="Email address ">
                                            <label>Tôi đã chấp nhận chính sách mua hàng <span class="required">*</span></label>

                                        </p>
                                    </div>
                                </div>
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
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{$totalCount}}
                                            </td>
                                            <td class="product-total">
                                                {{$totalPrice}}đ

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
                                        <h5>Direct Bank Transfer</h5>
                                        <div class="payment-content">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                        <!-- ACCORDION END -->
                                        <!-- ACCORDION START -->
                                        <h5>Cheque Payment</h5>
                                        <div class="payment-content">
                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                        <!-- ACCORDION END -->
                                        <!-- ACCORDION START -->
                                        <h5>PayPal</h5>
                                        <div class="payment-content">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                        </div>
                                        <!-- ACCORDION END -->
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="submit" value="Place order" />
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
