@extends('layout')
@section('content')
<div class="form_user">
    <div class="signup">
        <h4 class="signup_heading">
            Thông Tin Chi Tiết
        </h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="5%" >STT</th>
                    <th scope="col" width="25%">Tên tài khoản</th>
                    <th scope="col">Năm sinh</th>
                    <th scope="col">Email</th>
                    <th scope="col"width="15%" >Số điện thoại</th>
                    <td>Chỉnh sữa </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $customer_id = Session::get('customer_id');
                if($customer_id!=NULL){ 
            ?>
             @foreach(\Illuminate\Support\Facades\DB::table('tbl_customers')->get() as $user) 
                <tr>
                    <th scope="row">1</th>
                    <td>{{$user->customer_name}}</td>
                    <td>{{$user->customer_namsinh}}</td>
                    <td>{{$user->customer_email}}</td>
                    <td>{{$user->customer_phone}}</td>
                
                    <td>
                        <a href="{{URL::to('/edit-infomation-user/'.$user->customer_id)}}" class="active" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                    </td>
                </tr>    
             @endforeach
             <tbody>
            <?php
                } 
            ?>
            </tbody>

        </table>
    </div>
</div>
@endsection 