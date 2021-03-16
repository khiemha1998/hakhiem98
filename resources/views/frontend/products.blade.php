@extends('frontend.layouts.main')
@section('product')
    <div class="banner-area section-pt">
        <div class="container">
            <div class="row">
                @foreach($banners as $item)
                    @if($item->type == 2)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-banner mb-30">
                                <a href="#"><img src="{{ $item ->image }}" alt=""></a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    <div class="product-area section-pb section-pt-30">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <ul class="nav product-tab-menu" role="tablist">
                        @foreach($list as $key => $item)
                            <li class="{{ ($key==0 ?'product-tab-item' : 'product-tab__item') }} nav-item {{ ($key==0 ?'active' : '') }}">
                                <a class="product-tab__link nav-link" id="nav-{{$key}}-tab" data-toggle="tab" href="#nav-{{$key}}" role="tab" aria-selected="{{ ($key==0 ?'true' : '') }}">{{$item['category']->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="tab-content product-tab__content" id="product-tabContent">
                @foreach($list as $key => $item)
                    <div class="tab-pane fade  {{ ($key==0 ?'show active' : '') }}  "  id="nav-{{$key}}" role="tabpanel">
                        <div class="product-carousel-group">

                            <div class="row product-active-row-4">
                                @foreach($item['products'] as $product)

                                    <div class="col-lg-12">
                                        <!-- single-product-area start -->
                                        <div class="single-product-area mt-30">
                                            <div class="product-thumb">
                                                <a href="{{ route('shop.productdetails',['slug'=>$product->slug,'id'=>$product->id]) }}">
                                                    <img class="primary-image" src="{{asset($product->image)}}" alt="">
                                                </a>
                                                <div class="label-product label_new">New</div>
                                                <div class="action-links">
                                                    <a href="{{ route('shop.cart.add-to-cart',['id'=>$product->id])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                    <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                    <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                                </div>
                                                <ul class="watch-color">
                                                    <li class="twilight"><span></span></li>
                                                    <li  class="portage"><span></span></li>
                                                    <li class="pigeon"><span></span></li>
                                                </ul>
                                            </div>
                                            <div class="product-caption">
                                                <h4 class="product-name"><a href="product-details.html">{{$product->name}}</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">{{number_format( $product->sale,0,",",".")}}đ</span>
                                                    <span class="old-price">{{number_format( $product->price,0,",",".")}}đ</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-area end -->
                                    </div>

                                @endforeach

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="our-brand-area section-pb">
        <div class="container">
            <div class="row our-brand-active">
                @foreach($brand as $item)
                    <div class="brand-single-itm">
                        <a href="#"><img src="{{$item->image}}" alt=""></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="newletter-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newletter-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12">
                                <div class="newsletter-title mb-30">
                                    <h3>Join Our <br><span>Newsletter Now</span></h3>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-7">
                                <div class="newsletter-footer mb-30">
                                    <input type="text" placeholder="Your email address...">
                                    <div class="subscribe-button">
                                        <button class="subscribe-btn">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
