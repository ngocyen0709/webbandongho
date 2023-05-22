<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Session;
use App\Slider;
use App\Http\Requests;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function edit_infomation_user(Request $request,$customer_id){
        $meta_desc = "Chuyên bán đồng hồ, nhiều loại"; 
        $meta_keywords = "dong ho dien tu thong minh";
        $meta_title = "SWatch";
        $url_canonical = $request->url();
        $edit_user = DB::table('tbl_customers')->where('customer_id',$customer_id)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        return view('admin.edit_user')->with('edit_user',  $edit_user)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('meta_desc',$meta_desc)
        ->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function infomation(Request $request){
        $meta_desc = "Chuyên bán đồng hồ, nhiều loại"; 
        $meta_keywords = "dong ho dien tu thong minh";
        $meta_title = "SWatch";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby(DB::raw('RAND()'))->paginate(20);  
        
        // $info_user = DB::table('tbl_customers')->where('customer_id', $customer_id)->get();
        $info_user = Customer::findOrFail($request->customer_id);
        return view('pages.infomation')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('info_user',$info_user);
          
    }
    public function index(Request $request){
        $meta_desc = "Chuyên bán đồng hồ, nhiều loại"; 
        $meta_keywords = "dong ho dien tu thong minh";
        $meta_title = "SWatch";
        $url_canonical = $request->url();
         
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby(DB::raw('RAND()'))->paginate(20);  

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)
            ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); 
    }
    public function search(Request $request){
        $meta_desc = "Chuyên bán những phụ kiện, điện thoại di động"; 
        $meta_keywords = "thiet bi game,phu kien game,game phu kien,game giai tri";
        $meta_title = "Home | 5.0-Store";
        $url_canonical = $request->url();

        $tukhoa = $request->tukhoatimkiem;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$tukhoa.'%')->get(); 

        return view('pages.sanpham.timkiem')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); 
    }
    public function send_mail(){
        $to_name = "Ngoc Yen";
                $to_email = "nguyenngocyen2001.minihp@gmail.com";
               
                $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa');
                
                Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

                    $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
                return redirect('/')->with('message','');
    }
    public function add_user(){
        $this->AuthLogin();
        return view('admin.add_user');
    }
    public function all_user(){
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_user', $manager_category_product);
    }
}
