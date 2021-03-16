
<header class="header">

<div class="header-top-area d-none d-lg-block text-color-white bg-gren border-bm-1">

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="header-top-settings">
                    <ul class="nav align-items-center">
                        <li class="language">VN <i class="fa fa-angle-down"></i>
                            <ul class="dropdown-list">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                            </ul>
                        </li>
                        <li class="curreny-wrap">Currency <i class="fa fa-angle-down"></i>
                            <ul class="dropdown-list curreny-list">
                                <li><a href="#">$ USD</a></li>
                                <li><a href="#"> € EURO</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="top-info-wrap text-right">
                    <ul class="my-account-container">
{{--                        <li><a href="{{route('shop.checkIn')}}">Tài Khoản</a></li>--}}
                        <li><a href="{{route('shop.cart')}}">Giỏ hàng</a></li>

                        <?php
                        $customer_id = Session::get('customer_id');
                        $shipping_id = Session::get('id');
                        if($customer_id!=NULL && $shipping_id==NULL){
                        ?>
                        <li><a href="{{route('shop.cart.order')}}">Thanh toán</a></li>
                        <?php
                        }elseif($customer_id!=NULL && $shipping_id!=NULL){
                        ?>
                        <li><a href="{{route('shop.payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                        <?php
                        }else{
                        ?>
                        <li><a href="{{route('shop.login')}}">Thanh toán</a></li>                        <?php
                        }
                        ?>
                        <li><a href="wishlist.html">Yêu thích</a></li>

                        <?php
                        $customer_id = Session::get('customer_id');
                        if($customer_id!=NULL){
                        ?>
                        <li><a href="{{route('shop.logout')}}">Đăng xuất</a></li>
                        <?php
                        }else{
                        ?>
                        <li><a href="{{route('shop.login')}}">Đăng nhập</a></li>                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="haeader-mid-area bg-gren border-bm-1 d-none d-lg-block ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-5">
                <div class="logo-area">
                    <a href="{{route('shop.index')}}"><img src="/frontend/images/logo/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-box-wrapper">
                    <div class="search-box-inner-wrap">
                        <form class="search-box-inner" method="get" action="{{route('shop.search')}}" >
                            <div class="search-select-box">
                                <select class="nice-select">
                                    <optgroup label=" Watch">
                                        <option value="volvo">All</option>
                                        <option value="saab">Watch</option>
                                        <option value="saab">Air cooler</option>
                                    </optgroup>
                                    <optgroup label="Fashion">
                                        <option value="mercedes">Womens tops</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="search-field-wrap">
                                <input  value="{{isset($keyword) ? $keyword : ''}}" type="text" class="search-field" name="search" placeholder="Search product...">

                                <div class="search-btn">
                                    <button type="submit"><i class="icon-magnifier"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="right-blok-box text-white d-flex">

                    <div class="user-wrap">
                        <a href="wishlist.html"><span class="cart-total">2</span> <i class="icon-heart"></i></a>
                    </div>

                    <div class="shopping-cart-wrap">
                        <a href="{{route('shop.cart')}}"><i class="icon-basket-loaded"></i>
                            <span class="cart-total">
                                {{ !empty(session('totalItem')) ? session('totalItem') : 0 }}
                            </span></a>
{{--                        <ul class="mini-cart">--}}
{{--                            @foreach($cart as $cart)--}}
{{--                            <li class="cart-item">--}}
{{--                                <div class="cart-image">--}}
{{--                                    <a href="product-details.html"><img alt="" src="{{$cart->options->image}}"></a>--}}
{{--                                </div>--}}
{{--                                <div class="cart-title">--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        <h4>{{$cart->name}}</h4>--}}
{{--                                    </a>--}}
{{--                                    <div class="quanti-price-wrap">--}}
{{--                                        <span class="quantity">{{$cart->qty}} ×{{number_format( $cart->price,0,",",".")}}đ</span>--}}

{{--                                    </div>--}}
{{--                                    <a class="remove_from_cart" href="#"><i class="icon-trash icons"></i></a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            @endforeach--}}

{{--                            <li class="subtotal-box">--}}
{{--                                <div class="subtotal-title">--}}
{{--                                    <h3>Sub-Total :</h3><span>{{$totalPrice}}đ</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="mini-cart-btns">--}}
{{--                                <div class="cart-btns">--}}
{{--                                    <a href="{{route('shop.cart')}}">View cart</a>--}}
{{--                                    <a href="checkout.html">Checkout</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="haeader-bottom-area bg-gren header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 d-none d-lg-block">
                <div class="main-menu-area white_text">
                    <!--  Start Mainmenu Nav-->
                    <nav class="main-navigation text-center">
                        <ul>
                            <li><a href="{{ route('shop.index') }}">Trang Chủ</a></li>
                            @foreach($menu as $item)
                                @if($item->parent_id == 0)
                                 <li class="active"><a href="">{{ $item->name }}<i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @foreach($menu as $child)
                                            @if($child->parent_id ==$item->id )
                                            <li><a href="{{ route('shop.productbycategory',['slug'=>$child->slug]) }}"> {{$child->name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                            </li>
                                @endif
                            @endforeach
                            <li><a href="{{route('shop.blog')}}">Blogs</a></li>
{{--                            <li><a href="about-us.html">About Us</a></li>--}}
                            <li><a href="{{ route('shop.contact') }}">Liên HỆ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-5 col-md-6 d-block d-lg-none">
                <div class="logo"><a href=""><img src="/frontend/images/logo/logo.png" alt=""></a></div>
            </div>


            <div class="col-lg-3 col-md-6 col-7 d-block d-lg-none">
                <div class="right-blok-box text-white d-flex">

                    <div class="user-wrap">
                        <a href="wishlist.html"><span class="cart-total">2</span> <i class="icon-heart"></i></a>
                    </div>

                    <div class="shopping-cart-wrap">
                        <a href="{{route('shop.cart')}} "><i class="icon-basket-loaded"></i>
                            <span class="cart-total">
                                {{ !empty(session('totalItem')) ? session('totalItem') : 0 }}
                            </span></a>

                    </div>

                    <div class="mobile-menu-btn d-block d-lg-none">
                        <div class="off-canvas-btn">
                            <a href="#"><img src="/frontend/images/icon/bg-menu.png" alt=""></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- off-canvas menu start -->
<aside class="off-canvas-wrapper">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
            <i class="fa fa-times"></i>
        </div>

        <div class="off-canvas-inner">

            <div class="search-box-offcanvas">
                <form method="get" action="{{route('shop.search')}}">
                    <input value="{{isset($keyword) ? $keyword : ''}}" type="text" placeholder="Tìm kiếm...">
                    <button type="submit" class="search-btn"><i class="icon-magnifier"></i></button>
                </form>
            </div>

            <!-- mobile menu start -->
            <div class="mobile-navigation">

                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="{{route('shop.index')}}">Trang Chủ</a>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Shop</a>
                            <ul class="megamenu dropdown">
                                @foreach($menu as $item)
                                    @if($item->parent_id == 0)
                                <li class="mega-title has-children"><a href="#">{{ $item->name }}</a>
                                    <ul class="dropdown">
                                        @foreach($menu as $child)
                                            @if($child->parent_id ==$item->id )
                                                <li><a href="{{ route('shop.productbycategory',['slug'=>$child->slug]) }}"> {{$child->name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-has-children "><a href="{{route('shop.blog')}}">Blog</a>
                        </li>
                        <li class="menu-item-has-children "><a href="{{route('shop.contact')}}">Liên Hệ</a>

                        </li>

                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->


            <div class="header-top-settings offcanvas-curreny-lang-support">
                <h5>My Account</h5>
                <ul class="nav align-items-center">
                    <li class="language">English <i class="fa fa-angle-down"></i>
                        <ul class="dropdown-list">
                            <li><a href="#">English</a></li>
                            <li><a href="#">French</a></li>
                        </ul>
                    </li>
                    <li class="curreny-wrap">Currency <i class="fa fa-angle-down"></i>
                        <ul class="dropdown-list curreny-list">
                            <li><a href="#">$ USD</a></li>
                            <li><a href="#"> € EURO</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- offcanvas widget area start -->
            <div class="offcanvas-widget-area">
                <div class="top-info-wrap text-left text-black">
                    <h5>My Account</h5>
                    <ul class="offcanvas-account-container">
                        <li><a href="{{route('shop.cart')}}">Giỏ hàng</a></li>

                        <?php
                        $customer_id = Session::get('customer_id');
                        $shipping_id = Session::get('id');
                        if($customer_id!=NULL && $shipping_id==NULL){
                        ?>
                        <li><a href="{{route('shop.cart.order')}}">Thanh toán</a></li>
                        <?php
                        }elseif($customer_id!=NULL && $shipping_id!=NULL){
                        ?>
                        <li><a href="{{route('shop.payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                        <?php
                        }else{
                        ?>
                        <li><a href="{{route('shop.login')}}">Thanh toán</a></li>                        <?php
                        }
                        ?>
                        <li><a href="wishlist.html">Yêu thích</a></li>

                        <?php
                        $customer_id = Session::get('customer_id');
                        if($customer_id!=NULL){
                        ?>
                        <li><a href="{{route('shop.logout')}}">Đăng xuất</a></li>
                        <?php
                        }else{
                        ?>
                        <li><a href="{{route('shop.login')}}">Đăng nhập</a></li>                        <?php
                        }
                        ?>
                    </ul>
                </div>

            </div>
            <!-- offcanvas widget area end -->
        </div>
    </div>
</aside>
<!-- off-canvas menu end -->
</header>
