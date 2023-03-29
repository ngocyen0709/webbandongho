@extends('layout1')
@section('content')
<style>
	.image{
		width: 60px;
	}
</style>
<section id="cart_items">
	<div class="container">
		<div class="table-responsive cart_info">
			<?php
				$content = Cart::content();
			?>
			@if(session()->has('message'))
                <div class="alert alert-success">
                    {!! session()->get('message') !!}
                </div>
            @elseif(session()->has('error'))
                 <div class="alert alert-danger">
                    {!! session()->get('error') !!}
                </div>
            @endif
			<table class="table table-condensed" >
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sản phẩm</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng</td>
						<td class="del-one">Xóa sản phẩm</td>
					</tr>
				</thead>
				<tbody>
						@if(Session::get('cart')==true)
							@php
									$total = 0;
							@endphp
					
							@foreach($content as $v_content)
							@php
								$subtotal = $v_content->price*$v_content->qty;
								$total+=$subtotal;
							@endphp
							<tr>
								<td class="cart_product">
									<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50" alt="" /></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{$v_content->name}}</a></h4>
								</td>
								<td class="cart_price">
									<p>{{number_format($v_content->price, 0, '.', '.')}}</p>
								</td>
								<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
								{{ csrf_field() }}
								<td class="cart_quantity">
									<div class="cart_quantity_button">
											<input class="cart_quantity_input" type="number" min="1" name="cart_quantity" value="{{$v_content->qty}}"  style="width: 50px;">
											<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
											<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm check_out" style="margin-top:-2px";>
										
									</div>
								</td>
								</form>
								<td class="cart_total">
									<p class="cart_total_price">
										<?php
										$subtotal = $v_content->price * $v_content->qty;
										echo number_format($subtotal, 0, '.', '.');
										?>
									</p>
								</td>
								<td class="cart_delete" style="margin-left:50px";>
									<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							@endforeach
							<tr>
								<td>
									<input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm">
								
								</td>
								<td>
									<a href="{{url('/del-all-product')}}" class="btn btn-default check_out">Xóa tất cả</a>
								</td>
								<td>
								{{-- 	<a class="btn btn-default update" href="">Update</a> --}}
								<?php
									$customer_id = Session::get('customer_id');
									if($customer_id!=NULL){ 
									?>
									
									<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Đặt hàng</a>
									<?php
								}else{
									?>
									
									<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Đặt hàng</a>
									<?php 
								}
									?></td>
							</tr>
						@endif
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection