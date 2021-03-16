<?php

namespace App\Http\Controllers;

use App\Category;
use App\Setting;
use Cart;
use Illuminate\Http\Request;


class GeneralController extends Controller
{

    protected $categories;
   public function __construct()
{
       $menu = Category::where([
           'is_active'=>1
       ])->orderBy('position','ASC')->orderBy('id','DESC')->get();
       //TT Cau Hinh
       $setting = Setting::first();


        $cart = Cart::content();
        $totalPrice = Cart::total(0,",","."); // lấy tổng giá của sản phẩm


       //Chia sẻ dữ liệu qua tất cả các layouts
       view()->share([
           'setting'=>   $setting,
           'menu'=>  $menu,
           'cart' => $cart,
           'totalPrice' => $totalPrice
       ]);


   }

}

