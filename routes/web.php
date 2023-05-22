<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\GalleryController;
//user

Route::get('/add-user',[UserController::class, 'add_user']);
Route::get('/all-user',[UserController::class,'all_user']);

Route::get('/edit-infomation-user/{customer_id}',[HomeController::class,'edit_infomation_user'])->name('customer.edit_infomation_user');
Route::get('/', [HomeController::class, 'index']);
Route::get('/trangchu', [HomeController::class, 'index']);
Route::post('/timkiem', [HomeController::class, 'search']);
Route::post('/update-user/{customer_id}', [HomeController::class, 'update_user']);
Route::get('/infomation/{customer_id}', [HomeController::class,'infomation'])->name('customer.infomation');

//danh mục sản phảm Tc
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'hien_thi_danh_muc_trang_chu']);
Route::get('/thuong-hieu-san-pham/{category_id}', [BrandProduct::class, 'hien_thi_thuong_hieu_trang_chu']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);

/*backend*/
Route::get('/quanli',[AdminController::class,'show_index']);
Route::get('/dashboard', [AdminController::class,'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//category-product
Route::get('/add-category-product',[CategoryProduct::class, 'add_category_product']);
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']);

Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class, 'delete_category_product']);

Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class, 'active_category_product']);

Route::post('/save-category-product', [CategoryProduct::class,'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class,'update_category_product']);


//brand product
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product'] );
Route::get('/all-brand-product',[BrandProduct::class,'all_brand_product'] );

Route::get('/edit-brand-product/{brand_product_id}',[BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}',[BrandProduct::class, 'delete_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}',[BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}',[BrandProduct::class, 'active_brand_product']);

Route::post('/save-brand-product', [BrandProduct::class,'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class,'update_brand_product']);

//product
Route::get('/add-product', [ProductController::class, 'add_product'] );
Route::get('/all-product',[ProductController::class,'all_product'] );

Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);

Route::get('/unactive-product/{product_id}',[ProductController::class,'unactive_product']);
Route::get('/active-product/{product_id}',[ProductController::class,'active_product']);
 
Route::post('/save-product', [ProductController::class,'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class,'update_product']);

//Cart
Route::post('/save-cart', [CartController::class,'save_cart']);
Route::post('/add-cart-ajax', [CartController::class,'add_cart_ajax']);
Route::post('/update-cart-quantity', [CartController::class,'update_cart_quantity']);
Route::get('/show-cart', [CartController::class,'show_cart']);
Route::get('/gio-hang', [CartController::class,'gio_hang']);
Route::get('/delete-to-cart/{rowId}', [CartController::class,'delete_to_cart']);
Route::get('/del-all-product', [CartController::class,'delete_all_product']);

//Checkoout
Route::post('/confirm-order', [CheckoutController::class,'confirm_order']);
Route::get('/del-fee', [CheckoutController::class,'del_fee']);
Route::get('/login-checkout', [CheckoutController::class,'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class,'logout_checkout']);
Route::post('/add-customer', [CheckoutController::class,'add_customer']);
Route::post('/order-place', [CheckoutController::class,'order_place']);
Route::post('/login-customer', [CheckoutController::class,'login_customer']);
Route::get('/checkout', [CheckoutController::class,'checkout']);
Route::get('/tratien', [CheckoutController::class,'tratien']);
Route::post('/save-checkout-customer', [CheckoutController::class,'save_checkout_customer']);


Route::post('/select-delivery-home', [CheckoutController::class,'select_delivery_home']);
Route::post('/calculate-fee', [CheckoutController::class,'calculate_fee']);



//order
Route::get('/print-order/{checkout_code}', [OderController::class,'print_order']);
Route::get('/manage-order', [OderController::class,'manage_order']);
Route::get('/view-order/{order_code}', [OderController::class,'view_order']);
Route::get('/view-order-customer/{order_code}', [OderController::class,'view_order_customer']);
Route::post('/update-order-qty', [OderController::class,'update_order_qty']);
Route::post('/update-qty', [OderController::class,'update_qty']);
Route::get('/history', [OderController::class,'history']);
//coupon
Route::post('/check-coupon', [CartController::class,'check_coupon']);
Route::get('/unset-coupon', [CouponController::class,'unset_coupon']);
Route::get('/insert-coupon', [CouponController::class,'insert_coupon']);
Route::get('/list-coupon', [CouponController::class,'list_coupon']);
Route::get('/delete-coupon/{coupon_id}', [CouponController::class,'delete_coupon']);
Route::post('/insert-coupon-code', [CouponController::class,'insert_coupon_code']);

//Gửi mail
Route::get('/send-mail', [HomeController::class,'send_mail']);
Route::get('/login-facebook', [AdminController::class,'login_facebook']);
Route::get('/quanli/callback', [AdminController::class,'callback_facebook']);
Route::post('filter-by-date', [AdminController::class,'filter_by_date']);
Route::post('dashboard-filter', [AdminController::class,'dashboard_filter']);
Route::post('days-order', [AdminController::class,'days_order']);

//đăng nhập google
Route::get('/login-google', [AdminController::class,'login_google']);
Route::get('/google/callback', [AdminController::class,'callback_google']);	

//Delivery
Route::get('/delivery', [DeliveryController::class,'delivery']);
Route::post('/select-delivery', [DeliveryController::class,'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class,'insert_delivery']);
Route::post('/select-feeship', [DeliveryController::class,'select_feeship']);
Route::post('/update-delivery', [DeliveryController::class,'upd ate_delivery']);

//gallery
Route::get('/add-gallery/{product_id}', [GalleryController::class,'add_gallery']);
Route::post('/select-gallery', [GalleryController::class,'select_gallery']);
Route::post('/insert-gallery/{pro_id}', [GalleryController::class,'insert_gallery']);
Route::post('/update-gallery-name', [GalleryController::class,'update_gallery_name']);
Route::post('/delete-gallery', [GalleryController::class,'delete_gallery']);
Route::post('/update-gallery', [GalleryController::class,'update_gallery']);
