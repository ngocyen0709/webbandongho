<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Social;
use Socialite;
use App\Login;
use App\Models\Statistic;
use App\Http\Controllers\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
use App\Rules\Captcha; 

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('quanli')->send();
        }
    }
    public function days_order(){
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date',[$sub30days,$now])->orderBy('order_date','ASC')->get();

        
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,//doanh số
                'profit' => $val->profit,//lợi nhuận
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function dashboard_filter(Request $request){
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
           
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value'] == '7ngay'){
            $get = Statistic::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();

        }elseif($data['dashboard_value'] == 'thangtruoc'){

            $get = Statistic::whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();

        }elseif($data['dashboard_value'] == 'thangnay'){

            $get = Statistic::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();

        }else{
            $get = Statistic::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }

        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,//doanh số
                'profit' => $val->profit,//lợi nhuận
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function filter_by_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistic::whereBetween('order_date',[$from_date, $to_date])->orderBy('order_date', 'ASC')->get();

        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,//doanh số
                'profit' => $val->profit,//lợi nhuận
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
   public function show_index(){
        return view('admin_login');
   }
   public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
   }
//    public function dashboard(Request $request)
//    {
//         $admin_email = $request->$admin_email;
//         $admin_password = md5($request->$admin_password);

//         $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
//         if($result){
//             Session::put('admin_name',$result->$admin_name);
//             Session::put('admin_id',$result->$admin_id);
//             return Redirect::to('/dashboard');
//         }else{
//             Session::put('message','Mật khẩu hoặc tài khoản bị sai. Vui lòng nhập lại');
//             return Redirect::to('/quanli');
//         }
//     }

    public function dashboard(Request $request){
        $this->AuthLogin();
        $data = $request->validate([
           //validation laravel 
             'admin_email' => 'required',
             'admin_password' => 'required',
         ]);

         $admin_email = $data['admin_email'];
         $admin_password = $data['admin_password'];
         $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
         if($login){
            $login_count = $login->count();
            if($login_count > 0){
                Session::put('admin_name', $login->admin_name);
                Session::put('admin_id', $login->admin_id);
                return Redirect::to('/dashboard');
            }
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai. Vui lòng nhập lại');
                return Redirect::to('/quanli');
        }
     }
     public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/quanli');
     }
// public function login_facebook(){
//    return Socialite::driver('facebook')->redirect();
// }

    //  public function callback_facebook(){
    //       $provider = Socialite::driver('facebook')->user();
    //       $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
    //       if($account){
    //         //login in vao trang quan tri  
    //            $account_name = Login::where('admin_id',$account->user)->first();
    //            Session::put('admin_name',$account_name->admin_name);
    //            Session::put('admin_id',$account_name->admin_id);
    //            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    //        }else{

    //         $yen = new Social([
    //             'provider_user_id' => $provider->getId(),
    //             'provider' => 'facebook'
    //         ]);

    //         $orang = Login::where('admin_email',$provider->getEmail())->first();

    //         if(!$orang){
    //             $orang = Login::create([
    //                 'admin_name' => $provider->getName(),
    //                 'admin_email' => $provider->getEmail(),
    //                 'admin_password' => '123',
    //                 'admin_phone' => '123'
    //             ]);
    //         }
    //         $yen->login()->associate($orang);
    //         $yen->save();

    //         $account_name = Login::where('admin_id',$account->user)->first();

    //         Session::put('admin_name',$account_name->admin_name);
    //          Session::put('admin_id',$account_name->admin_id);
    //         return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    //     } 
    // }
//---------------------------------login-facebook------------------
     public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $yen = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => ''
                    
                ]);
            }
            $yen->login()->associate($orang);
            $yen->save();

            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }

//---------------------------------login-google--------------------
     public function login_google(){
          return Socialite::driver('google')->redirect();
          
    }
    public function callback_google(){
          $users = Socialite::driver('google')->stateless()->user(); 
          $authUser = $this->findOrCreateUser($users,'google');
          if($authUser){
               $account_name = Login::where('admin_id',$authUser->user)->first();
               Session::put('admin_name',$account_name->admin_name);
               Session::put('admin_id',$account_name->admin_id);
          }
          elseif($customer_new){
               $account_name = Login::where('admin_id',$authUser->user)->first();
               Session::put('admin_name',$account_name->admin_name);
               Session::put('admin_id',$account_name->admin_id);
          }
          return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công'); 
    }

    public function findOrCreateUser($users,$provider){
          $authUser = Social::where('provider_user_id', $users->id)->first();
          if($authUser){

            return $authUser;
          }
          else{
          $customer_new = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
          ]);
          $orang = Login::where('admin_email',$users->email)->first();
               if(!$orang){
                $orang = Login::create([
                    'admin_name' => $users->name,
                    'admin_email' => $users->email,
                    'admin_password' => '',
                    'admin_phone' => '',
                    'admin_status' => 1
                ]);
          }
               $customer_new->login()->associate($orang);
               $customer_new->save();
               return $customer_new;
          }
    }
}    
