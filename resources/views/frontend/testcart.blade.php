@extends('frontend.layouts.main')
@section('cart')
    <style>
        .css-image img{
            width: 45%;
        }
        .css-input input{
            width: 100%;
        }
        .input-color input{
            color: white;
            background: black;
            border: none;
        }
        .input-color input:hover {
            background: #c89979;
            color: #fff;
        }
        .css-coupon{
            position: absolute;
            margin-top: -10%;
        }

    </style>


    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Giỏ hàng</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb cart-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="plantmore-product-price">Unit Price</th>
                                    <th class="plantmore-product-quantity">Quantity</th>
                                    <th class="plantmore-product-subtotal">Total</th>
                                    <th class="plantmore-product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td class="plantmore-product-thumbnail css-image"><a href="#"><img src="{{$item->options->image}}" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="#">{{$item->name}}</a></td>
                                    <td class="plantmore-product-price"><span class="amount">{{ number_format($item->price ,0,",",".") }} đ</span></td>
                                    <td >
                                            <form action="{{route('shop.update_cart_quantity')}}" method="POST">
                                                @csrf
                                                <input class="" name="rowId_cart" value="{{$item->rowId}}" type="hidden">
                                                <input class="" name="cart_quantity" value="{{$item->qty}}" type="number">
                                                <br>
                                                <input  class="submit update-qty" name="update_cart" value="Cập nhật" type="submit">
                                            </form>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{ number_format($item->qty * $item->price ,0,",",".") }} đ</span></td>
                                    <td class="plantmore-product-remove"><a href="{{URL::to('/delete-to-cart/'.$item->rowId)}}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="coupon-all">

                                    <div class="coupon2">
                                        <input class="submit" name="update_cart" value="Update cart" type="submit">
                                        <a href="{{route('shop.products')}}" class=" continue-btn">Continue Shopping</a>
                                    </div>

                                    <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal <span>{{$totalPrice}} đ</span></li>
                                        <li>Thuế <span>{{Cart::tax().'vnđ'}}</span></li>
                                        <li>Phí vận chuyển <span>Free</span></li>
                                        <li>Thành tiền <span>{{$totalPrice}}đ</span></li>

                                    </ul>
                                    <a href="#" class="proceed-checkout-btn">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection





