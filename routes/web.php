<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','ShopController@index')->name('shop.index');
Route::get('/lien-he','ShopController@contact')->name('shop.contact');
Route::post('/lien-he','ShopController@postContact')->name('shop.postContact');
Route::get('/san-pham/{slug}','ShopController@productbycategory')->name('shop.productbycategory');
Route::get('/chi-tiet/{slug}_{id}','ShopController@productdetails')->name('shop.productdetails');
Route::get('/san-pham','ShopController@products')->name('shop.products');
Route::get('/blog','ShopController@blog')->name('shop.blog');
Route::get('/chi-tiet-blog/{slug}','ShopController@blogdetails')->name('shop.blogdetails');
Route::get('/gio-hang','CartController@cart')->name('shop.cart');
Route::post('/dat-hang', 'CartController@postOrder')->name('shop.cart.postOrder');
Route::get('/dat-hang', 'CartController@order')->name('shop.cart.order');
Route::get('/error404','ShopController@notfound')->name('shop.notfound');
Route::get('/giohang','CartControllers@Cart')->name('shop.testcart');

//Thêm sản phẩm vào giỏ
Route::post('/save-cart', 'CartControllers@addtocart')->name('shop.addtocart');
Route::post('/gio-hang/cap-nhat-so-luong-sp-sp', 'CartControllers@updateCart')->name('shop.update_cart_quantity');
Route::get('/delete-to-cart/{rowId}', 'CartControllers@removeToCart')->name('shop.delete-to-cart');


// Thêm sản phẩm vào giỏ hàng
Route::post('/gio-hang/them-sp-vao-gio-hang', 'CartController@addToCart')->name('shop.add-to-cart');
// Xóa SP khỏi giỏ hàng
Route::get('/gio-hang/xoa-sp-gio-hang/{rowId}', 'CartController@removeToCart')->name('shop.delete-to-cart');

// Cập nhật giỏ hàng
Route::post('/gio-hang/cap-nhat-so-luong-sp', 'CartController@updateCart')->name('shop.update_cart_quantity');
// Hủy đơn đặt hàng
Route::get('/gio-hang/huy-don-hang', 'CartController@destroy')->name('shop.cart.destroy');

Route::get('/dat-hang/hoan-tat-dat-hang', 'CartController@completedOrder')->name('shop.cart.completedOrder');
// Thêm sản phẩm vào giỏ hàng
Route::get('/gio-hang/them-sp-vao-gio-hang/{product_id}', 'CartController@addProductsToCart')->name('shop.cart.add-to-cart');
Route::get('/tim-kiem','ShopController@search')->name('shop.search');

//coupon
Route::post('/check_coupon','CartController@check_coupon')->name('shop.check_coupon');
Route::get('/unsetCoupon','CouponController@unset_coupon')->name('shop.unsetCoupon');

//Sent mail
Route::get('/sent-mail','ShopController@sentMail')->name('shop.sentMail');


// checkout
Route::get('/customer','CheckOutController@login_checkout')->name('shop.login');
Route::get('/logout','CheckOutController@logout_checkout')->name('shop.logout');
Route::post('/login','CheckOutController@loginCustomers')->name('shop.loginCustomers');
Route::post('/them-tai-khoan','CheckOutController@addCustomers')->name('shop.addcustomers');
Route::get('/dat-hang', 'CheckOutController@order')->name('shop.cart.order');
Route::post('/dat-hang', 'CheckOutController@postOrder')->name('shop.cart.postOrder');
Route::get('/thanh-toan','CheckOutController@payment')->name('shop.payment');
Route::post('/dia-chi-giao-hang','CheckOutController@orderPlace')->name('shop.orderPlace');





//Route::get('/','HomeController@index');

// php artisan route:list
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/login', 'AdminController@postLogin')->name('admin.postLogin');
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');




// Gom nhom route
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=>'checkLogin'],function () {
    Route::resource('banner', 'BannerController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('vendor', 'VendorController');
    Route::resource('setting', 'SettingController');
    Route::resource('user', 'UserController');
    Route::resource('article','ArticleController');
    Route::resource('blog','BlogController');
    Route::resource('brand','BrandController');
    Route::resource('order','OrderController');
    Route::resource('coupon','CouponController');
    Route::resource('delivery','DeliveryController');
    Route::post('/select-delivery','DeliveryController@select_delivery');




});




