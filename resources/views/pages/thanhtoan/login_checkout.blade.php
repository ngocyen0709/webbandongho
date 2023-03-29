@extends('layout')
@section('content')
<section id="form mt-sm-3"><!--form-->
	<div class="row">
		<div class="col-sm-4 col-sm-offset-1" style="margin-left: 90px">
			<div class="login-form"><!--login form-->
				<h2>Đăng nhập tài khoản</h2>
				<form action="{{URL::to('/login-customer')}}" method="POST">
					{{csrf_field()}}
					<input type="text" name="email_account" placeholder="Tài Khoản" />
					<input type="password" name="password_account" placeholder="Mật khẩu" />
					<span>
						<input type="checkbox" class="checkbox"> 
						Ghi nhớ đăng nhập
					</span>
					<button type="submit" class="btn btn-default">Đăng nhập</button>
				</form>
			</div><!--/login form-->
		</div>
		<div class="col-sm-1">
			<h2 class="or">Hoặc</h2>
		</div>
		<div class="col-sm-4">
			<div class="signup-form"><!--sign up form-->
				<h2>Cập nhật thông tin tài khoản</h2>
				<form action="{{URL::to('/add-customer')}}" method="POST">
					{{ csrf_field() }}
					<input type="text" name="customer_name" placeholder="Họ và tên"/>
					<input type="text" name="customer_namsinh" placeholder="Năm Sinh"/>
					<input type="email" name="customer_email" placeholder="Địa chỉ email"/>
					<input type="password" name="customer_password" placeholder="Mật khẩu"/>
					<input type="text" name="customer_phone" placeholder="Phone"/>
					<button type="submit" class="btn btn-default">Xác nhận</button>
				</form>
			</div><!--/sign up form-->
		</div>
	</div>		
</section><!--/form-->
@endsection