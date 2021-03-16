
@extends('frontend.layouts.main')
@section('order')
    <style>
        .css-image img{
            width: 25%;
        }
        /*.css-input input{*/
        /*    width: 100%;*/
        /*}*/
        /*.input-color input{*/
        /*    color: white;*/
        /*    background: black;*/
        /*    border: none;*/
        /*}*/
        /*.input-color input:hover {*/
        /*    background: #c89979;*/
        /*    color: #fff;*/
        /*}*/
        /*.css-coupon{*/
        /*    position: absolute;*/
        /*    margin-top: -10%;*/
        /*}*/

    </style>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thanh Toán</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<div class="main-content-wrap section-ptb cart-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
{{--                <form action="#" class="cart-table">--}}
                    <div class="table-content table-responsive">
                        <table class="table">
                            <h3>Xem lại giỏ hàng</h3>
                            <thead>
                            <tr>
                                <th class="plantmore-product-thumbnail">Ảnh</th>
                                <th class="cart-product-name">Sản Phẩm</th>
                                <th class="plantmore-product-price">Giá</th>
                                <th class="plantmore-product-quantity">Số lượng</th>
                                <th class="plantmore-product-subtotal">Tổng Giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                            <tr>
                                <td class="plantmaore-product-thumbnail  css-image"><a href="#"><img src="{{$item->options->image}}" alt=""></a></td>
                                <td class="plantmore-product-name"><a href="#">{{$item->name}}</a></td>
                                <td class="plantmore-product-price"><span class="amount">{{ number_format($item->price ,0,",",".") }} đ</span></td>
                                <td class="plantmore-product-quantity">
{{--                                    <input value="1" type="number">--}}
                                    {{$item->qty}}
                                </td>
                                <td class="product-subtotal"><span class="amount">{{ number_format($item->qty * $item->price ,0,",",".") }} đ</span></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                <form action="{{route('shop.orderPlace')}}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-8">
                            <div class="coupon-all">
                                <h3 style="font-weight: bold">Hình Thức Thanh Toán </h3>

                                    <div class="method">
                                         <span>
                                            <label><input type="radio" value="3"  name="payment_option">Thanh toán trả Góp</label>
                                        </span>
                                         <span>
                                            <label><input type="radio" value="1" name="payment_option">Thanh toán bằng thẻ ATM</label>
                                        </span>
                                        <span>
                                            <label><input type="radio" value="2" name="payment_option">Thanh toán tiền mặt khi nhận hàng</label>
                                        </span>


                                    </div>

{{--                                <div class="coupon">--}}
{{--                                    <h3>Coupon</h3>--}}
{{--                                    <p>Enter your coupon code if you have one.</p>--}}
{{--                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">--}}
{{--                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Tổng Phụ <span>{{ $totalPrice }} đ</span></li>
                                    @if(Session::get('coupon'))
                                        <li>
                                            <?php
                                            $totalAmount = (float) $totalAmount;
                                            ?>
                                            @foreach(Session::get('coupon') as $key => $cou)
                                                @if($cou['type']==1)
                                                    Mã giảm : {{$cou['percent']}} %
                                                    <p>
                                                        @php
                                                            $total_coupon = ($totalAmount*  $cou['percent'])/100;
                                                            echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'đ</li></p>';
                                                        @endphp
                                                    </p>
                                                    <p><li>Tổng đã giảm :{{number_format($totalAmount-$total_coupon,0,',','.')}}đ</li></p>
                                    @elseif($cou['type']==2)
                                        Mã giảm : {{number_format($cou['percent'],0,',','.')}} k
                                        <p>
                                            @php
                                                $total_coupon = $totalAmount - $cou['percent'];
                                            @endphp
                                        </p>
                                        <p><li>Tổng đã giảm :{{number_format($total_coupon,0,',','.')}}đ</li></p>
                                        @endif
                                        @endforeach
                                        </li>

                                    @elseif(!Session::get('coupon'))
                                        <li>Tổng  <span>{{ number_format($totalAmount ,0,",",".")}}đ</span></li>
                                    @endif
{{--                                    <li>Subtotal <span> @if($coupon_session = Session::get('total_coupon'))--}}
{{--                                                {{number_format($coupon_session['total_final'],0,',','.')}}đ--}}

{{--                                            @else--}}
{{--                                                {{$totalPrice}}đ--}}
{{--                                                --}}{{--                                                    {{number_format($totalPrice,0,',','.')}}đ--}}
{{--                                            @endif</span></li>--}}
{{--                                    <li>Total <span> @if($coupon_session = Session::get('total_coupon'))--}}
{{--                                                {{number_format($coupon_session['total_final'],0,',','.')}}đ--}}

{{--                                            @else--}}
{{--                                                {{$totalPrice}}đ--}}
{{--                                                --}}{{--                                                    {{number_format($totalPrice,0,',','.')}}đ--}}
{{--                                            @endif</span></li>--}}
                                </ul>
                                <button type="submit" class="proceed-checkout-btn"> ĐẶT MUA</button>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('shop.orderPlace')}}" method="POST">
                    </form>

{{--                </form>--}}
            </div>

        </div>

    </div>
</div>

@endsection
