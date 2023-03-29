@extends('layout')
@section('content')
<section id="cart_items">
			<div class="row register-req">
				<p>Thanh toán đơn hàng</p>
			</div><!--/register-req-->

			
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>
			<div class="table-responsive cart_info">
			<?php
			$content = Cart::content();
			?>
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sp</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $v_content)
					<tr  style="font-size: 14px">
						<td class="cart_product">
							<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50" alt="" /></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$v_content->name}}</a></h4>
							<p>Web ID: 1089772</p>
						</td>
						<td class="cart_price" >
							<p>{{number_format($v_content->price, 0, '.', '.')}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
								{{ csrf_field() }}
								<input class="cart_quantity_input" type="number" min="1" name="cart_quantity" value="{{$v_content->qty}}"  >
								<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
								<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
								</form>
							</div>
						</td>
						<td class="cart_total" >
							<p class="cart_total_price">
								<?php
								$subtotal = $v_content->price * $v_content->qty;
								echo number_format($subtotal, 0, '.', '.');
								?>
							</p>
						</td>
						<td class="cart_delete" style="padding-right: 20px;">
							<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
			<form action="{{URL::to('order-place')}}" method="POST">
				{{csrf_field()}}
			<div class="payment-options">
				<h4>Chọn hình thức thanh toán</h4>
					<span><label><input name="payment_option" value="1" type="checkbox"> Thanh toán chuyển khoản</label></span>
					<span><label><input name="payment_option" value="2" type="checkbox"> Thanh toán khi nhận hàng</label></span>
					<input type="submit" value="Đặt hàng" name="send_order" class="btn btn-primary btn-sm send_order_place">
				</div>
			</form>
	</section> <!--/#cart_items-->
@endsection