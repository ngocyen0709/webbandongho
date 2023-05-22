<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Slider;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Http\Requests;
use App\Models\Product;


use Illuminate\Support\Facades\Redirect;
session_start();


class CheckoutController extends Controller
{
    public function confirm_order(Request $request){
        $data = $request->all();
        // $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->matp = $data['order_matp'];
        $shipping->maqh = $data['order_maqh'];
        $shipping->xaid = $data['order_xaid'];
              
        
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order;
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();
        
        $content = Cart::content();
        if($content){
           foreach($content as $key => $v_content){
                $order_details = new OrderDetails;
                $order_details->order_code = $checkout_code;
                $order_details->product_id =  $v_content->id;
                $order_details->product_name =   $v_content->name;
                $order_details->product_price =   $v_content->price; 
                $order_details->product_sales_quantity = $v_content->qty;
                $order_details->product_coupon =  $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
           }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
        // $content = Cart::content();
        // foreach($content as $v_content){
        //     $order_d_data['order_id'] = $order_id;
        //     $order_d_data['product_id'] = $v_content->id;
        //     $order_d_data['product_name'] = $v_content->name;
        //     $order_d_data['product_price'] = $v_content->price;
        //     $order_d_data['product_sales_quantity'] = $v_content->qty;
        //     DB::table('tbl_chitietdonhang')->insert($order_d_data);
        // }
        // if($data['payment_method']==1){
        //     echo 'Thanh toán thẻ ATM';
        // }else{
        //     Cart::destroy();
        //     $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        //     $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        //     return view('pages.thanhtoan.handcash')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        // }
   }
    public function del_fee(){
        Session::forget('fee');
        return redirect()->back();
    }
    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp', $data['matp'])->where('fee_maqh', $data['maqh'])->where('fee_xaid', $data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship > 0){
                    foreach($feeship as $key => $value){
                        Session::put('matp', $data['matp']);
                        Session::put('maqh', $data['maqh']);
                        Session::put('xaid', $data['xaid']);
                        Session::put('fee', $value->fee_feeship);
                        Session::save();
                    }
                }
                else{
                    Session::put('matp', $data['matp']);
                    Session::put('maqh', $data['maqh']);
                    Session::put('xaid', $data['xaid']);
                    Session::put('fee', '30000');
                    Session::save();
                }
            }
        }
    }
    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }
    public function login_checkout(Request $request){
        $meta_desc = "Đăng nhập"; 
        $meta_keywords = "Đăng nhập";
        $meta_title = "Đăng nhập";
        $url_canonical = $request->url();

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        return view('pages.thanhtoan.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical);
    }
   public function add_customer(Request $request){

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_namsinh'] = $request->customer_namsinh;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/login-checkout');
    }

    public function checkout(Request $request){
        $meta_desc = "Đăng nhập thanh toán"; 
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
        $city = City::orderby('matp','ASC')->get();

        return view('pages.thanhtoan.checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)->with('city',$city);
    }
     public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        
        return Redirect::to('/tratien');
    }
    public function tratien(Request $request){
         $meta_desc = "Đăng nhập thanh toán"; 
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        return view('pages.thanhtoan.tratien')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical);
    }
    public function logout_checkout(){
        Session::forget('customer_id');
        return Redirect::to('/login-checkout');
    }
    public function order_place(Request $request){
        //lay hinh thuc thanh toan
        $meta_desc = "Đăng nhập thanh toán"; 
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--insert method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang duyệt';
        $payment_id = DB::table('tbl_tratien')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_donhang')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_chitietdonhang')->insert($order_d_data);
        }
        if($data['payment_method']==1){
            echo 'Thanh toán thẻ ATM';

        }else{
            Cart::destroy();

            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
            return view('pages.thanhtoan.handcash')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        }
    }
    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
        }
        Session::save();
    }
}
