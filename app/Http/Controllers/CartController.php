<?php

namespace App\Http\Controllers;

use App\Coupon;
use Session;
use App\Order;
use App\OrderDetail;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\Exception;
use function React\Promise\all;
use DB;

class CartController extends GeneralController
{
    /**
     * Danh sách sản phẩm trong giỏ hàng
     */
    public function cart()
    {
        $cart = Cart::content();
        $total = Cart::total(0,'',''); // lấy tổng giá của sản phẩm
        $totalPrice = Cart::total(0,',','.');
        return view('frontend.cart', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalAmount' => $total,
        ]);
    }
    public function addToCart(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity = $request->input('qty');
        $product_info = DB::table('products')->where('id',$productId)->first();
        $data['id'] = $product_info->id;
        $data['qty'] =$quantity;
        $data['name'] = $product_info->name;
        $data['price'] = $product_info->price;
        $data['options']['image'] = $product_info->image;
        Cart::add($data);
        session(['totalItem' => Cart::count()]);
        return redirect()->route('shop.cart');
    }
    public function addProductsToCart(Request $request, $id){
        $product = Product::findOrFail($id);

        $cartInfo = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->sale,
            'options' => [
                'image' => $product->image
            ]
        ];
        // gọi đến thư viện thêm sản phẩm vào giỏ hàng
        Cart::add($cartInfo);

        session(['totalItem' => Cart::count()]);

        // chuyển về trang danh sách
        return redirect()->route('shop.index');


    }
    public function removeToCart($rowId){
        Cart::update($rowId,0);
        session(['totalItem' => Cart::count()]);
        return redirect()->route('shop.cart');

    }
    public function updateCart(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->input('cart_quantity');
        Cart::update($rowId,$qty);
        session(['totalItem' => Cart::count()]);
        return redirect()->route('shop.cart');
    }

    // Hủy đơn hàng
    public function destroy(Request $request)
    {   Session::forget('cart');
        // remove session
        Cart::destroy();
        Session::forget('coupon');
        session(['totalItem' => Cart::count()]);
        return redirect('/');
    }


    /**
     * Xóa sản phảm khỏi giỏ hàng
     * @param $id Product Id
     */
//    public function removeToCart($rowId)
//    {
//        // xóa sản phẩm trong giỏ
//        Cart::remove($rowId);
//        $cart = Cart::content();
//        $totalPrice = Cart::total(0,",","."); // lấy tổng giá của sản phẩm
//
//        return view('frontend.components.cart', [
//            'cart' => $cart,
//            'totalPrice' => $totalPrice
//        ]);
//    }

    /**
     * Cập nhật số lượng sản phẩm trong giỏ
     */
//    public function updateToCart(Request $request)
//    {
//        // check nhập số lượng không đúng định dạng
//        $validator = Validator::make($request->all(), [
//            'qty' => 'required|numeric|min:1',
//        ]);
//
//        // check số lượng lỗi
//        if ($validator->fails()) {
//            return false;
//        }
//
//        $rowId = $request->input('rowId');
//        $qty = (int) $request->input('qty');
//
//        // cập nhật lại số lương
//        Cart::update($rowId, $qty);
//
//        $cart = Cart::content();
//        $totalPrice = Cart::total(0,",","."); // lấy tổng giá của sản phẩm
//
//
//        return view('frontend.components.cart', [
//            'cart' => $cart,
//            'totalPrice' => $totalPrice
//        ]);
//    }

    /**
     * Form Hiển thị hoàn tất đơn đặt hàng
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function completedOrder()
    {
        return view('frontend.cart.completed');
    }

    public function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('code',$data['code'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'code' => $coupon->code,
                            'type' => $coupon->type,
                            'quantity' => $coupon->quantity,
                            'percent' => $coupon->percent,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'code' => $coupon->code,
                        'type' => $coupon->type,
                        'quantity' => $coupon->quantity,
                        'percent' => $coupon->percent,

                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                $this->applyCouponTotal();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }

        }else{
            return redirect()->back()->with('error','Mã giảm giá không đúng');
        }




    }


    public function applyCouponTotal()
    {
        $total = Cart::total(0,'',''); // lấy tổng giá của sản phẩm
        $coupon_session = Session::get('coupon');
        $totalFinal = $total;
        $totalDiscount = 0;
        if ($coupon_session) {
            foreach ($coupon_session as $key => $cou)
            {
                if ($cou['type'] == 1 ){
                    $totalDiscount = ($total* $cou['percent'])/100;
                }elseif ($cou['type']==2) {
                    $totalDiscount =  $cou['percent'];
                }
            }

        }
        $totalFinal = $total - $totalDiscount;
        $total_coupon = array(
            'total_final' => $totalFinal

        );

        Session::put('total_coupon',$total_coupon);
        return $this;

    }
}
