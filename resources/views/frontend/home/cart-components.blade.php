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

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="#" class="cart-table hihi">
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="plantmore-product-thumbnail">Ảnh</th>
                            <th class="cart-product-name">Sản Phẩm</th>
                            <th class="plantmore-product-price">Giá Bán</th>
                            <th class="plantmore-product-quantity">Số Lượng</th>
                            <th class="plantmore-product-subtotal">Tổng</th>
                            <th class="plantmore-product-remove">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(Session::get('cart')==true)
                            @foreach($cart as $item)
                                <tr>
                                    <td class="plantmore-product-thumbnail css-image"><a href="#"><img src="{{asset($item->options->image)}}" alt=""></a></td>
                                    {{--                                <td class="plantmore-product-thumbnail"><a href="#"><img src="/frontend/images/other/01.jpg" alt=""></a></td>--}}
                                    <td class="plantmore-product-name"><a href="#">{{$item->name}}</a></td>
                                    <td class="plantmore-product-price"><span class="amount">{{ number_format($item->price ,0,",",".") }} đ</span></td>
                                    <td class="plantmore-product-quantity quantity css-input">
                                        {{--                                    <input value="1" type="number">--}}
                                        <input type="number" name="qty" class="quantity  item-qty" value="{{ $item->qty }}" >
                                        <br>
                                        <div class="input-color">
                                            <input data-id="{{ $item->rowId }}" class="submit update-qty" name="update_cart" value="Cập nhật" type="submit">
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{ number_format($item->qty * $item->price ,0,",",".") }} đ</span></td>
                                    <td class="plantmore-product-remove">
                                        <a class="remove-to-cart" data-id="{{$item->rowId}}" href="javascript:void(0)">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="coupon-all">

                            <div class="coupon2">
                                {{--                                <a data-id="{{ $item->rowId }}" href="javascript:void(0)" class="update-qty">Cập nhật</a>--}}
                                <a href="{{ route('shop.cart.destroy') }}" class=" continue-btn">Hủy đơn hàng</a>

                                <a href="{{route('shop.index')}}" class=" continue-btn">Tiếp tục </a>


                                @if(Session::get('coupon'))
                                    <a class="btn btn-default check_out" href="{{route('shop.unsetCoupon')}}">Xóa mã khuyến mãi</a>
                                @endif


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ml-auto">
                        <div class="cart-page-total">
                            <h2>Thanh Toán</h2>
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
                            </ul>
                            <a href="{{route('shop.cart.order')}}" class="proceed-checkout-btn">Đặt Hàng</a>
                        </div>
                    </div>
                </div>
            </form>
            @if(Session::get('cart'))
                <form action="{{route('shop.check_coupon')}}" method="post" >
                    @csrf
                    <div class="coupon css-coupon">
                        <h3>Phiếu Giảm Giá</h3>
                        <p>Nhập mã phiếu giảm giá của bạn.</p>
                        <input id="coupon_code" class="input-text " name="code" value=""  type="text">
                        <button class=" check_coupon continue-btn" name="apply_coupon"  type="submit">Kiêm Tra</button>

                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript">
        $(function () {
            // xóa sản phẩm khỏi giỏ hàng
            $(document).on("click", '.remove-to-cart', function () {
                var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng ?");
                if (result) {
                    var product_id = $(this).attr('data-id');
                    $.ajax({
                        url: '/gio-hang/xoa-sp-gio-hang/' + product_id,
                        type: 'get',
                        data: {
                            id: product_id
                        }, // dữ liệu truyền sang nếu có
                        dataType: "HTML", // kiểu dữ liệu trả về
                        success: function (response) {
                            $('#my-cart').html(response);
                        },
                        error: function (e) { // lỗi nếu có
                            console.log(e.message);
                        }
                    });
                }
            });

            // cập nhật số lượng của từng sản phẩm trong giỏ hàng
            $(document).on("click", '.update-qty', function (e) {
                var rowId = $(this).attr('data-id');
                var qty = $(this).closest('.quantity').find('.item-qty').val(); // lấy số lượng của ô input

                // Kiểm tra Nếu không phải là số nguyên Hoặc số lượng < 1
                if (isNaN(qty) || qty < 1) {
                    alert("Số lượng là số nguyên lớn hơn >= 1");
                    $(this).closest('.quantity').find('.item-qty').val(1);
                    return false;
                }

                $.ajax({
                    url: '/gio-hang/cap-nhat-so-luong-sp',
                    type: 'get',
                    data: {
                        rowId: rowId,
                        qty: qty
                    }, // dữ liệu truyền sang nếu có
                    dataType: "HTML", // kiểu dữ liệu trả về
                    success: function (response) {
                        if (response != false) {
                            $('#my-cart').html(response);
                        }
                    },
                    error: function (e) { // lỗi nếu có
                        console.log(e.message);
                    }
                });
            });
        })
    </script>
@endsection
