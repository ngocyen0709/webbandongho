<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');}
        else{
             return Redirect::to('quanli')->send();}
    }
    public function add_user(){
        $this->AuthLogin();
        return view('admin.add_user');
    }
    public function all_user(){
        $this->AuthLogin();
        $all_user = DB::table('tbl_users')->get();
        $manager_user = view('admin.all_user')->with('all_user', $all_user);
        return view('admin_layout')->with('admin.all_user', $manager_user);
    }

    public function unactive_user($user_id){
        $this->AuthLogin();
        DB::table('tbl_user')->where('category_id',$user_id)->update(['category_status'=>1]);
        Session::put('message','hiển thị danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');

    }
    public function active_user($user_id){
        $this->AuthLogin();
        DB::table('tbl_users')->where('user_id',$user_id)->update(['user_status'=>0]);
        Session::put('message','Ẩn người dùng thành công!');
        return Redirect::to('all-user');
    }

    public function edit_user($user_id){
        $this->AuthLogin();
        $edit_user = DB::table('tbl_users')->where('category_id',$user_id)->get();
        $manager_user  = view('admin.edit_user')->with('edit_user',$edit_user);

        return view('admin_layout')->with('admin.edit_user', $manager_user);
    }
    public function delete_user($user_id){
        $this->AuthLogin();
        DB::table('tbl_users')->where('category_id',$user_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-user');
    }
    public function update_user(Request $request,$user_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->user_name;
        $data['meta_keywords'] = $request->user_keywords;
        $data['category_desc'] = $request->user_desc;
        DB::table('tbl_users')->where('user_id',$user_id)->update($data);
        Session::put('message','Cập nhật thông tin người dùng thành công');
        return Redirect::to('all-user');
    }

    public function save_user(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->user_name;
        $data['meta_keywords'] = $request->user_keywords;
        $data['category_desc'] = $request->user_desc;
        $data['category_status'] = $request->user_status;
            
        DB::table('tbl_user')->insert($data);
        Session::put('message','Thêm người dùng thành công!');
        return Redirect::to('add-category-product');
    }
  
}
