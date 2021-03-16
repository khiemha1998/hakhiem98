<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Shipping;
use Illuminate\Http\Request;
use Session;
use DB;
use Cart;
use Mail;


class CheckOutController extends GeneralController
{
    public function login_checkout()
    {
        return view('frontend.checkout.login');
    }
    public function logout_checkout(){
        Session::flush();
        return redirect()->route('shop.login');
    }
    public function loginCustomers(Request $request){
        $request->validate([
            'email_account' => 'required|email|max:255',
            'password_account'=> 'required',
        ]);
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        if ($result){
            Session::put('customer_id',$result->customer_id);
            return redirect()->route('shop.cart.order');
        }else{
            return redirect()->route('shop.login')->with('msg','Tài khoản hoặc mật khẩu không đúng!');
        }
    }
    public function addCustomers(Request $request){
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_password'=> 'required',
            'customer_phone'=> 'required',
        ]);
//        $customers =$request->all();
//        dd($customers);
//        $customers = new Customer();
//        $customers->name=$request->input('user_name');
//        $customers->email=$request->input('user_email');
//        $customers->password=md5($request->input('user_password'));
//        $customers->phone=$request->input('user_phone');
//        $customer_id = $customers->save();
//        Session::put('id',$customer_id);
//        Session::put('name',$request->input('user_name'));
//        return redirect()->route('shop.cart');
        $data = array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $data['customer_phone']=$request->customer_phone;
        $customer_id = DB::table('customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return redirect()->route('shop.cart');
    }

    /**
     * Đặt hàng
     */
    public function order()
    {
        $totalCount = Cart::count();
        $totalPrice = Cart::total(0,",","."); // lấy tổng giá của sản phẩm
        // Kiểm tra xem có sản phẩm nào trong giỏ hàng
        if ($totalCount <= 0) {
//            return back()->with('msg', 'Bạn chưa có sản phẩm nào trong giỏ hàng');
            return redirect()->route('shop.cart');
        }
        return view('frontend.cart.order', [
            'totalCount' => $totalCount,
            'totalPrice' => $totalPrice,
        ]);
    }

    /**
     * Xử lý lưu đơn đặt hàng
     */
    public function postOrder(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required',

        ]);

        $data = [];
        $data['name']=$request->fullname;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['phone']=$request->phone;
        $data['note']=$request->note;
        $shipping_id = DB::table('shipping')->insertGetId($data);

        $data_email = $request->input('email');
        $email =$request->session()->put('email',$data_email);
//        $email =  $request->session()->get('email');

        Session::put('shipping_id',$shipping_id);

        return redirect()->route('shop.payment');

    }
    public function payment(){

        $cart = Cart::content();
        $total = Cart::total(0,'',''); // lấy tổng giá của sản phẩm
        $totalPrice = Cart::total(0,',','.');

        return view('frontend.cart.payment',['cart'=>$cart,'totalPrice' => $totalPrice, 'totalAmount' => $total,]);
    }
    public function orderPlace(Request $request){

       $cart = Cart::content();
       $totalCount = Cart::count();
       $totalPrice = Cart::total(0,"",""); // lấy tổng giá của sản phẩm
       $intotalPrice = floatval($totalPrice);

       // insert payment
        $data = [];
        $data['payment_method']=$request->payment_option;
        $data['payment_status']='Đang chờ xử lí';
        $payment_id = DB::table('payment')->insertGetId($data);

        //insert order
        $order_data = [];
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=$intotalPrice;
        $order_data['order_status']='Đang chờ xử lí';
        $order_id = DB::table('order')->insertGetId($order_data);

        //insert order_details
        foreach ($cart as $value){
//        $orderDetail=new OrderDetail();
        $order_detail = [];
        $order_detail['order_id']=$order_id;
        $order_detail['product_id']=$value->id;
        $order_detail['product_name']=$value->name;
        $order_detail['product_price']=$value->price;
        $order_detail['product_qty']=$value->qty;
        $order_detail_id = DB::table('order_details')->insertGetId($order_detail);

        }
        if ( $data['payment_method'] ==1){
            echo 'Thanh toán ATM';
        }elseif ($data['payment_method'] ==2){
            $maDonHang =  'DH-'.date('d').date('m').date('Y'); // Tạo mã đơn hàng
            $to_name = "Khiem Ha Vlogs";
            $to_email = session::get('email');//send to this email

            //body of mail.blade.php
            $data = [
                "name"=>"Mail từ tài khoản Khách hàng",
                "body"=>'Cảm ơn '
            ];
            Mail::send('frontend.sendmail',$data,function($message) use ($to_name,$to_email){
                $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
                $message->from($to_email,$to_name);//send from this mail
            });

            Cart::destroy();
            session(['totalItem' => Cart::count()]);
            return redirect()->route('shop.cart.completedOrder')->with('msg','Cảm ơn bạn đã đặt hàng- Mã đơn hàng là:'.$maDonHang);
        }else{
            echo 'Trả Góp';
        }
    }











//    public function postOrder(Request $request)
//    {
//        $request->validate([
//            'fullname' => 'required|max:255',
//            'phone' => 'required',
//            'email' => 'required|email',
//            'address' => 'required',
//        ]);
//        $cart = Cart::content();
//        $totalCount = Cart::count();
//        $totalPrice = Cart::total(0,"",""); // lấy tổng giá của sản phẩm
//        $intotalPrice = floatval($totalPrice);
//        // Kiểm tra tồn tại giỏ hàng cũ
//        try {
//            // Lưu vào bảng đơn đặt hàng - orders
//            $order = new Order();
//            $order->fullname = $request->input('fullname');
//            $order->phone = $request->input('phone');
//            $order->email = $request->input('email');
//            $order->address = $request->input('address');
//            $order->note = $request->input('note');
//            $order->total = $intotalPrice;
//            $order->order_status_id = 1;
//            // 1 = mới
//            // Lưu vào bảng chỉ tiết đơn đặt hàng
//            if ($order->save()){
//                $maDonHang = 'DH-'.$order->id.'-'.date('d').date('m').date('Y'); // Tạo mã đơn hàng
//                $order->code = $maDonHang;
//                $order->save();
//
//                if (count($cart) >0) {
//                    foreach ($cart as $key => $item) {
//                        $_detail = new OrderDetail();
//                        $_detail->order_id = $order->id;
//                        $_detail->name = $item->name;
//                        $_detail->image = $item->options->image;
//                        $_detail->product_id = $item->id;
//                        $_detail->qty = $item->qty;
//                        $_detail->price = $item->price;
//                        $_detail->save();
//                    }
//                }
//
//                // Xóa thông tin giỏ hàng Hiện tại sau khi đặt hàng thành công
//                Cart::destroy();
//
//                return redirect()->route('shop.cart.completedOrder')->with('msg', 'Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn : #'.$order->code);
//            }
//
//        } catch (Exception $e) {
//            return redirect()->route('shop.cart.completedOrder')->with('msg', 'Đã xảy ra lỗi, vui lòng thử lại');
//        }
//    }

}
