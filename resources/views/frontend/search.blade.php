@extends('frontend.layouts.main')
@section('search')

    <div class="product-area section-pb section-pt-30">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4>Từ khóa tìm kiếm" {{$keyword}}"    Tìm thấy ({{count($products)}}) </h4>
                    </div>
                </div>
            </div>

            <div class="row product-active-lg-4">
                @foreach(  $products as $product)
                    <div class="col-lg-12">

                        <div class="single-product-area mt-30">
                            <div class="product-thumb">
                                <a href="{{route('shop.productdetails',['slug'=>$product->slug,'id'=>$product->id])}}">
                                    <img class="primary-image" src="{{asset($product->image)}}" alt="">
                                </a>
                                <div class="label-product label_new">New</div>
                                <div class="action-links">
                                    <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                    <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                    <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                </div>
                                <ul class="watch-color">
                                    <li class="twilight"><span></span></li>
                                    <li class="pigeon"><span></span></li>
                                    <li  class="portage"><span></span></li>
                                </ul>
                            </div>
                            <div class="product-caption">
                                <h4 class="product-name"><a href="{{route('shop.productdetails',['slug'=>$product->slug,'id'=>$product->id])}}">{{ $product->name}}</a></h4>
                                <div class="price-box">
                                    <span class="new-price">{{number_format( $product->sale,0,",",".")}}đ</span>
                                    <span class="old-price">{{number_format( $product->price,0,",",".")}}đ</span>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>


        </div>

    </div>
@endsection

{{--@extends('frontend.layouts.main')--}}
{{--@section('search')--}}
{{--    <!-- breadcrumb-area start -->--}}
{{--    <div class="breadcrumb-area">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <!-- breadcrumb-list start -->--}}
{{--                    <ul class="breadcrumb-list">--}}
{{--                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>--}}
{{--                        <li class="breadcrumb-item active">Shop left sidebar</li>--}}
{{--                    </ul>--}}
{{--                    <!-- breadcrumb-list end -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb-area end -->--}}


{{--    <!-- main-content-wrap start -->--}}
{{--    <div class="main-content-wrap shop-page section-ptb">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-3 order-lg-1 order-2">--}}
{{--                    <!-- shop-sidebar-wrap start -->--}}
{{--                    <div class="shop-sidebar-wrap">--}}
{{--                        <div class="shop-box-area">--}}

{{--                            <!--sidebar-categores-box start  -->--}}
{{--                            <div class="sidebar-categores-box shop-sidebar mb-30">--}}
{{--                                <h4 class="title">Product categories</h4>--}}
{{--                                <!-- category-sub-menu start -->--}}
{{--                                <div class="category-sub-menu">--}}
{{--                                    <ul>--}}
{{--                                        @foreach($menu as $item)--}}
{{--                                            @if($item->parent_id==0)--}}
{{--                                                <li class="has-sub"><a href="{{route('shop.category',['slug'=>$item->slug])}}">{{$item->name}}</a>--}}
{{--                                                    <ul>--}}
{{--                                                        @foreach($menu as $child)--}}
{{--                                                            @if($child->parent_id==$item->id)--}}
{{--                                                                <li><a href="{{route('shop.category',['slug'=>$child->slug])}}">{{$child->name}}</a></li>--}}
{{--                                                            @endif--}}
{{--                                                        @endforeach--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <!-- category-sub-menu end -->--}}
{{--                            </div>--}}
{{--                            <!--sidebar-categores-box end  -->--}}

{{--                            <!-- shop-sidebar start -->--}}
{{--                            <div class="shop-sidebar mb-30">--}}
{{--                                <h4 class="title">Filter By Price</h4>--}}
{{--                                <!-- filter-price-content start -->--}}
{{--                                <div class="filter-price-content">--}}
{{--                                    <form action="#" method="post">--}}
{{--                                        <div id="price-slider" class="price-slider"></div>--}}
{{--                                        <div class="filter-price-wapper">--}}

{{--                                            <a class="add-to-cart-button" href="#">--}}
{{--                                                <span>FILTER</span>--}}
{{--                                            </a>--}}
{{--                                            <div class="filter-price-cont">--}}

{{--                                                <span>Price:</span>--}}
{{--                                                <div class="input-type">--}}
{{--                                                    <input type="text" id="min-price" readonly="" />--}}
{{--                                                </div>--}}
{{--                                                <span>—</span>--}}
{{--                                                <div class="input-type">--}}
{{--                                                    <input type="text" id="max-price" readonly="" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                <!-- filter-price-content end -->--}}
{{--                            </div>--}}
{{--                            <!-- shop-sidebar end -->--}}

{{--                            <!-- shop-sidebar start -->--}}
{{--                            <div class="shop-sidebar mb-30">--}}
{{--                                <h4 class="title">Filter by Color</h4>--}}

{{--                                <ul class="category-widget-list">--}}
{{--                                    <li><a href="#">Red (1)</a></li>--}}
{{--                                    <li><a href="#">White (1)</a></li>--}}
{{--                                </ul>--}}

{{--                            </div>--}}
{{--                            <!-- shop-sidebar end -->--}}

{{--                            <!-- shop-sidebar start -->--}}
{{--                            <div class="shop-sidebar mb-30">--}}
{{--                                <h4 class="title">Product tags</h4>--}}

{{--                                <ul class="sidebar-tag">--}}
{{--                                    <li><a href="#">accesories</a></li>--}}
{{--                                    <li><a href="#">blouse</a></li>--}}
{{--                                    <li><a href="#">clothes</a></li>--}}
{{--                                    <li><a href="#">desktop</a></li>--}}
{{--                                    <li><a href="#">digital</a></li>--}}
{{--                                    <li><a href="#">fashion</a></li>--}}
{{--                                    <li><a href="#">women</a></li>--}}
{{--                                    <li><a href="#">men</a></li>--}}
{{--                                    <li><a href="#">laptop</a></li>--}}
{{--                                    <li><a href="#">handbag</a></li>--}}
{{--                                </ul>--}}

{{--                            </div>--}}
{{--                            <!-- shop-sidebar end -->--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- shop-sidebar-wrap end -->--}}
{{--                </div>--}}
{{--                <div class="col-lg-9 order-lg-2 order-1">--}}

{{--                    <!-- shop-product-wrapper start -->--}}
{{--                    <div class="shop-product-wrapper">--}}
{{--                        <div class="row align-itmes-center">--}}
{{--                            <div class="col">--}}
{{--                                <!-- shop-top-bar start -->--}}
{{--                                <div class="shop-top-bar">--}}
{{--                                    <!-- product-view-mode start -->--}}

{{--                                    <div class="product-mode">--}}
{{--                                        <!--shop-item-filter-list-->--}}
{{--                                        <ul class="nav shop-item-filter-list" role="tablist">--}}
{{--                                            <li class="active"><a class="active grid-view" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a></li>--}}
{{--                                            <li><a class="list-view" data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                        <!-- shop-item-filter-list end -->--}}
{{--                                    </div>--}}
{{--                                    <!-- product-view-mode end -->--}}
{{--                                    <!-- product-short start -->--}}
{{--                                    <div class="product-short">--}}
{{--                                        <p>Sort By :</p>--}}
{{--                                        <select class="nice-select" name="sortby">--}}
{{--                                            <option value="trending">Relevance</option>--}}
{{--                                            <option value="sales">Name(A - Z)</option>--}}
{{--                                            <option value="sales">Name(Z - A)</option>--}}
{{--                                            <option value="rating">Price(Low > High)</option>--}}
{{--                                            <option value="date">Rating(Lowest)</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <!-- product-short end -->--}}
{{--                                </div>--}}
{{--                                <!-- shop-top-bar end -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <style>--}}
{{--                            .fix-box{--}}
{{--                                height: 111.4px;--}}
{{--                            }--}}
{{--                        </style>--}}
{{--                        <div class="col-md-12">--}}
{{--                            <h3>--}}
{{--                                <span class="cat-name">Từ khóa tìm kiếm "{{ $keyword }}" ({{ $totalResult }})</span>--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                        <!-- shop-products-wrap start -->--}}
{{--                        <div class="shop-products-wrap">--}}
{{--                            <div class="tab-content">--}}
{{--                                <div class="tab-pane active" id="grid">--}}
{{--                                    <div class="shop-product-wrap">--}}
{{--                                        <div class="row">--}}

{{--                                            @foreach($products as $product)--}}

{{--                                                <div class="col-lg-4 col-md-6">--}}
{{--                                                    <!-- single-product-area start -->--}}
{{--                                                    <div class="single-product-area mt-30">--}}
{{--                                                        <div class="product-thumb">--}}
{{--                                                            <a href="{{route('shop.ProductDetails',['slug'=>$product->slug])}}">--}}
{{--                                                                <img class="primary-image" src="{{asset($product->image)}}" alt="">--}}
{{--                                                            </a>--}}
{{--                                                            <div class="label-product label_new">New</div>--}}
{{--                                                            <div class="action-links">--}}
{{--                                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>--}}
{{--                                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>--}}
{{--                                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                            <ul class="watch-color">--}}
{{--                                                                <li class="twilight"><span></span></li>--}}
{{--                                                                <li  class="portage"><span></span></li>--}}
{{--                                                                <li class="pigeon"><span></span></li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="product-caption fix-box">--}}
{{--                                                            <h4 class="product-name"><a href="{{route('shop.ProductDetails',['slug'=>$product->slug])}}">{{$product->name}}</a></h4>--}}
{{--                                                            <div class="price-box">--}}
{{--                                                                <span class="new-price">{{number_format($product->sale)}}</span>--}}
{{--                                                                <span class="old-price">{{number_format($product->price)}}</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- single-product-area end -->--}}
{{--                                                </div>--}}

{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tab-pane" id="list">--}}
{{--                                    @foreach($products as $product)--}}
{{--                                        <div class="shop-product-list-wrap">--}}
{{--                                            <div class="row product-layout-list mt-30">--}}
{{--                                                <div class="col-lg-3 col-md-3">--}}
{{--                                                    <!-- single-product-wrap start -->--}}
{{--                                                    <div class="single-product">--}}
{{--                                                        <div class="product-image">--}}
{{--                                                            <a href="{{route('shop.ProductDetails',['slug'=>$product->slug])}}"><img src="{{asset($product->image)}}" alt="Produce Images"></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- single-product-wrap end -->--}}
{{--                                                </div>--}}

{{--                                                <div class="col-lg-6 col-md-6">--}}
{{--                                                    <div class="product-content-list text-left">--}}

{{--                                                        <h4><a href="{{route('shop.ProductDetails',['slug'=>$product->slug])}}" class="product-name">{{$product->name}}</a></h4>--}}
{{--                                                        <div class="price-box">--}}
{{--                                                            <span class="new-price">{{$product->sale}}</span>--}}
{{--                                                            <span class="old-price">{{$product->price}}</span>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="product-rating">--}}
{{--                                                            <ul class="d-flex">--}}
{{--                                                                <li><a href="#"><i class="icon-star"></i></a></li>--}}
{{--                                                                <li><a href="#"><i class="icon-star"></i></a></li>--}}
{{--                                                                <li><a href="#"><i class="icon-star"></i></a></li>--}}
{{--                                                                <li><a href="#"><i class="icon-star"></i></a></li>--}}
{{--                                                                <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}

{{--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto suscipit aliquam, dignissimos nesciunt, quos voluptas tenetur necessitatibus voluptate vitae quo quibusdam nihil.</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-lg-3 col-md-3">--}}
{{--                                                    <div class="block2">--}}
{{--                                                        <ul class="stock-cont">--}}
{{--                                                            <li class="product-sku">Sku: <span>P006</span></li>--}}
{{--                                                            <li class="product-stock-status">Availability: <span class="in-stock">In Stock</span></li>--}}
{{--                                                        </ul>--}}
{{--                                                        <div class="product-button">--}}

{{--                                                            <ul class="actions">--}}
{{--                                                                <li class="add-to-wishlist">--}}
{{--                                                                    <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="add-to-cart">--}}
{{--                                                                <div class="product-button-action">--}}
{{--                                                                    <a href="#" class="add-to-cart">Add to cart</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}

{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- shop-products-wrap end -->--}}

{{--                        <!-- paginatoin-area start -->--}}
{{--                    </div>--}}
{{--                    {{ $products->links() }}--}}
{{--                </div>--}}
{{--                <!-- paginatoin-area end -->--}}
{{--            </div>--}}
{{--            <!-- shop-product-wrapper end -->--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- main-content-wrap end -->--}}

{{--@endsection--}}
