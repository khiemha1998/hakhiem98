@extends('frontend.layouts.main')

@section('product')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->


<!-- main-content-wrap start -->
<div class="main-content-wrap shop-page section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <!-- shop-sidebar-wrap start -->
                <div class="shop-sidebar-wrap">
                    <div class="shop-box-area">

                        <!--sidebar-categores-box start  -->
                        <div class="sidebar-categores-box shop-sidebar mb-30">
                            <h4 class="title">Product categories</h4>
                            <!-- category-sub-menu start -->
                            <div class="category-sub-menu">
                                <ul>
                                    <li class="has-sub"><a href="#">Sports Watches</a>
                                        <ul>
                                            <li><a href="#">Watch men (3)</a></li>
                                            <li><a href="#">Sports Watches (4)</a></li>
                                            <li><a href="#">Watch Butter (4)</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Kitchen & Dining</a>
                                        <ul>
                                            <li><a href="#">Watch Woman (2)</a></li>
                                            <li><a href="#">Watch (1)</a></li>
                                            <li><a href="#">Watch Raisins (1)</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Casual Watches (12)</a>
                                        <ul>
                                            <li><a href="#">Watch Bag (4)</a></li>
                                            <li><a href="#">Hamburger (4)</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Dress Watches (8)</a>
                                        <ul>
                                            <li><a href="#">Digital Watches</a></li>
                                            <li><a href="#">Sheep's meat (8)</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Kitchen & Dining (11)</a>
                                        <ul>
                                            <li><a href="#">Digital (8)</a></li>
                                            <li><a href="#">Digital watch (8)</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Digital Watches (12)</a>
                                        <ul>
                                            <li><a href="#">Digital Man (8)</a></li>
                                            <li><a href="#">Fusion Watch (8)</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Crystal Watches (7)</a>
                                        <ul>
                                            <li><a href="#">Fusion Watch (8)</a></li>
                                            <li><a href="#">Sports's meat (8)</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">watch series (0)</a>

                                    </li>
                                    <li class="has-sub"><a href="#">watch tnt (11)</a>
                                        <ul>
                                            <li><a href="#">Sports (8)</a></li>
                                            <li><a href="#">Sheep's meat (8)</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- category-sub-menu end -->
                        </div>
                        <!--sidebar-categores-box end  -->

                        <!-- shop-sidebar start -->
                        <div class="shop-sidebar mb-30">
                            <h4 class="title">Filter By Price</h4>
                            <!-- filter-price-content start -->
                            <div class="filter-price-content">
                                <form action="#" method="post">
                                    <div id="price-slider" class="price-slider"></div>
                                    <div class="filter-price-wapper">

                                        <a class="add-to-cart-button" href="#">
                                            <span>FILTER</span>
                                        </a>
                                        <div class="filter-price-cont">

                                            <span>Price:</span>
                                            <div class="input-type">
                                                <input type="text" id="min-price" readonly="" />
                                            </div>
                                            <span>—</span>
                                            <div class="input-type">
                                                <input type="text" id="max-price" readonly="" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- filter-price-content end -->
                        </div>
                        <!-- shop-sidebar end -->

                        <!-- shop-sidebar start -->
                        <div class="shop-sidebar mb-30">
                            <h4 class="title">Filter by Color</h4>

                            <ul class="category-widget-list">
                                <li><a href="#">Red (1)</a></li>
                                <li><a href="#">White (1)</a></li>
                            </ul>

                        </div>
                        <!-- shop-sidebar end -->

                        <!-- shop-sidebar start -->
                        <div class="shop-sidebar mb-30">
                            <h4 class="title">Product tags</h4>

                            <ul class="sidebar-tag">
                                <li><a href="#">accesories</a></li>
                                <li><a href="#">blouse</a></li>
                                <li><a href="#">clothes</a></li>
                                <li><a href="#">desktop</a></li>
                                <li><a href="#">digital</a></li>
                                <li><a href="#">fashion</a></li>
                                <li><a href="#">women</a></li>
                                <li><a href="#">men</a></li>
                                <li><a href="#">laptop</a></li>
                                <li><a href="#">handbag</a></li>
                            </ul>

                        </div>
                        <!-- shop-sidebar end -->

                    </div>
                </div>
                <!-- shop-sidebar-wrap end -->
            </div>
            <div class="col-lg-9 order-lg-2 order-1">

                <!-- shop-product-wrapper start -->
                <div class="shop-product-wrapper">
                    <div class="row align-itmes-center">
                        <div class="col">
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar">
                                <!-- product-view-mode start -->

                                <div class="product-mode">
                                    <!--shop-item-filter-list-->
                                    <ul class="nav shop-item-filter-list" role="tablist">
                                        <li class="active"><a class="active grid-view" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a></li>
                                        <li><a class="list-view" data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a></li>
                                    </ul>
                                    <!-- shop-item-filter-list end -->
                                </div>
                                <!-- product-view-mode end -->
                                <!-- product-short start -->
                                <div class="product-short">
                                    <p>Sort By :</p>
                                    <select class="nice-select" name="sortby">
                                        <option value="trending">Relevance</option>
                                        <option value="sales">Name(A - Z)</option>
                                        <option value="sales">Name(Z - A)</option>
                                        <option value="rating">Price(Low > High)</option>
                                        <option value="date">Rating(Lowest)</option>
                                    </select>
                                </div>
                                <!-- product-short end -->
                            </div>
                            <!-- shop-top-bar end -->
                        </div>
                    </div>

                    <!-- shop-products-wrap start -->
                    <div class="shop-products-wrap">
                        <div class="tab-content">
                            <div class="tab-pane active" id="grid">
                                <div class="shop-product-wrap">
                                    <div class="row">
                                        @foreach($products as $products)
{{--                                            @if($item->parent_id==1)--}}
                                        <div class="col-lg-4 col-md-6">
                                            <!-- single-product-area start -->
                                            <div class="single-product-area mt-30">
                                                <div class="product-thumb">
                                                    <a href="{{ route('shop.productdetails',['slug'=>$products->slug,'id'=>$products->id]) }}">
                                                        <img class="primary-image" src="{{ asset($products->image) }}" alt="">
                                                    </a>
                                                    <div class="label-product label_new">New</div>
                                                    <div class="action-links">
                                                        <a href="{{route('shop.cart.add-to-cart',['id'=>$products->id])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                        <a href="" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                    </div>
                                                    <ul class="watch-color">
                                                        <li class="twilight"><span></span></li>
                                                        <li  class="portage"><span></span></li>
                                                        <li class="pigeon"><span></span></li>
                                                    </ul>
                                                </div>
                                                <div class="product-caption">
                                                    <h4 class="product-name"><a href="">{{$products->name}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format( $products->sale,0,",",".")}}đ</span>
                                                        <span class="old-price">{{number_format( $products->price,0,",",".")}}đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-area end -->
                                        </div>
{{--                                            @endif--}}
                                        @endforeach

                                    </div>
                                </div>
                            </div>
{{--                            <div class="phantrang">--}}
{{--                                {{$products->links()}}--}}

{{--                            </div>--}}




{{--                   --}}
                        </div>
                    </div>
                    <!-- shop-products-wrap end -->

                    <!-- paginatoin-area start -->
                    <div class="paginatoin-area">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <ul class="pagination-box">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li>
                                        <a class="Next" href="#">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- paginatoin-area end -->
                </div>
                <!-- shop-product-wrapper end -->
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
@endsection
