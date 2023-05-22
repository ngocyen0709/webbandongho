@extends('layout')
@section('content')
<div class="form_user">
    <div class="signup">
        <h4 class="signup_heading">
            Thông Tin Chi Tiết
        </h4>
        <table class="table table-bordered">
            <?php
        $customer_id = Session::get('customer_id'); ?>
        @if($customer_id)
            <thead>
                <tr>
                <th scope="col" width="5%" >STT</th>
                <th scope="col" width="25%">Tên tài khoản</th>
                <th scope="col">Năm sinh</th>
                <th scope="col">Email</th>
                <th scope="col"width="15%" >Số điện thoại</th>
                
                </tr>
            </thead>
            <tbody>
                
            @foreach($info_user as $user)   
                <tr>
                <th scope="row">1</th>
                <td>{{$user->customer_name}}</td>
                <td>{{$user->customer_namsinh}}</td>
                <td>{{$user->customer_email}}</td>
                <td>{{$user->customer_phone}}</td>
                
                </tr>
            @endforeach
            </tbody>
        @else{
            echo 'chưa co nguo dung';
        }
           
        @endif
        </table>
    </div>
</div>
@endsection 