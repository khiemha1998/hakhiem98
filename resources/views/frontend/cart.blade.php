@extends('frontend.layouts.main')
@section('cart')
    <!-- breadcrumb-area start -->
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
{{--           <div style="color: red"> {{Session('msg')}}</div>--}}
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {!! session()->get('message') !!}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {!! session()->get('error') !!}
        </div>
    @endif

    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb cart-page" id="my-cart">
        @include('frontend.components.cart')
    </div>
    <!-- main-content-wrap end -->
@endsection
