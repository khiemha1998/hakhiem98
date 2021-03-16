<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/ruiz-preview/ruiz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Dec 2020 03:06:02 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ruiz - Watch Store HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/images/favicon.ico">
{{--    <link rel="stylesheet" href="/stylecss/main.css">--}}

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/frontend/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="/frontend/css/vendor/simple-line-icons.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/frontend/css/plugins/animation.css">
    <link rel="stylesheet" href="/frontend/css/plugins/slick.css">
    <link rel="stylesheet" href="/frontend/css/plugins/animation.css">
    <link rel="stylesheet" href="/frontend/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/frontend/css/plugins/fancy-box.css">
    <link rel="stylesheet" href="/frontend/css/plugins/jqueryui.min.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="/frontend/js/vendor/vendor.min.js"></script>
    <script src="/frontend/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="/frontend/css/style.css">
    <!--<link rel="stylesheet" href="/frontend/css/style.min.css">-->

</head>

<body>

<div class="main-wrapper">

    <!--  Header Start -->
    @include('frontend.layouts.header')
    <!--  Header Start -->

@yield('content')
@yield('contact')
@yield('product')
@yield('productdetails')
@yield('blog')
@yield('cart')
@yield('blogdetail')
@yield('search')
@yield('notfound')
@yield('order')



    <!-- footer Start -->
   @include('frontend.layouts.footer')
    <!-- footer End -->




    <!-- Modal -->
    <div class="modal fade modal-wrapper" id="exampleModalCenter" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area">
                        <div class="row  product-details-inner">
                            <div class="col-lg-5 col-md-6 col-sm-6">
                                <!-- Product Details Left -->
                                <div class="product-large-slider">
                                    <div class="pro-large-img">
                                        <img src="/frontend/images/product/product-01.png" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="/frontend/images/product/product-02.png" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img ">
                                        <img src="/frontend/images/product/product-03.png" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="/frontend/images/product/product-04.png" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="/frontend/images/product/product-05.png" alt="product-details" />
                                    </div>

                                </div>
                                <div class="product-nav">
                                    <div class="pro-nav-thumb">
                                        <img src="/frontend/images/product/product-01.png" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="/frontend/images/product/product-02.png" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="/frontend/images/product/product-03.png" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="/frontend/images/product/product-04.png" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="/frontend/images/product/product-05.png" alt="product-details" />
                                    </div>
                                </div>
                                <!--// Product Details Left -->
                            </div>

                            <div class="col-lg-7 col-md-6 col-sm-6">
                                <div class="product-details-view-content">
                                    <div class="product-info">
                                        <h3>Single product One</h3>
                                        <div class="product-rating d-flex">
                                            <ul class="d-flex">
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                            <a href="#reviews">(<span class="count">1</span> customer review)</a>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$70.00</span>
                                            <span class="old-price">$78.00</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.</p>

                                        <div class="single-add-to-cart">
                                            <form action="#" class="cart-quantity d-flex">
                                                <div class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input type="number" class="input-text" name="quantity" value="1" title="Qty">
                                                    </div>
                                                </div>
                                                <button class="add-to-cart" type="submit">Add To Cart</button>
                                            </form>
                                        </div>
                                        <ul class="single-add-actions">
                                            <li class="add-to-wishlist">
                                                <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                            </li>
                                        </ul>
                                        <ul class="stock-cont">
                                            <li class="product-stock-status">Categories: <a href="#">Watchs,</a> <a href="#">Man Watch</a></li>
                                            <li class="product-stock-status">Tag: <a href="#">Man</a></li>
                                        </ul>
                                        <div class="share-product-socail-area">
                                            <p>Share this product</p>
                                            <ul class="single-product-share">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="/frontend/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- jQuery JS -->
<script src="/frontend/js/vendor/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="/frontend/js/vendor/popper.min.js"></script>
<script src="/frontend/js/vendor/bootstrap.min.js"></script>

<!-- Plugins JS -->
<script src="/frontend/js/plugins/slick.min.js"></script>
<script src="/frontend/js/plugins/jquery.nice-select.min.js"></script>
<script src="/frontend/js/plugins/countdown.min.js"></script>
<script src="/frontend/js/plugins/image-zoom.min.js"></script>
<script src="/frontend/js/plugins/fancybox.js"></script>
<script src="/frontend/js/plugins/scrollup.min.js"></script>
<script src="/frontend/js/plugins/jqueryui.min.js"></script>


<!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
<!--
<script src="/frontend/js/vendor/vendor.min.js"></script>
<script src="/frontend/js/plugins/plugins.min.js"></script>
-->

<!-- Main JS -->
<script src="/frontend/js/main.js"></script>
@yield('script')


</body>


<!-- Mirrored from demo.hasthemes.com/ruiz-preview/ruiz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Dec 2020 03:06:43 GMT -->
</html>
