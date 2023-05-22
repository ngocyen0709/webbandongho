@extends('layout')
@section('content')
<section id="cart_items">
<div class="row register-req">
	<p>Vui lòng đăng ký hoặc đăng nhập để thanh toán giỏ hàng.</p>
</div>
<div class="shopper-informations">
	<div class="row">
		<div class="col-sm-12 clearfix">
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
			<div class="table-responsive cart_info" style="width: 950px;margin-left: -15px;">
				<table class="table table-condensed" >
					<thead>
						<tr class="cart_menu">
							<td class="image" style="width:70px;">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price" align="center" >  Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total" align="center">Tổng</td>
							<td>  </td>
						</tr>
					</thead>
					<tbody>
						@if(Session::get('cart') == true)
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
								<td class="cart_quantity" >
									<div class="cart_quantity_button">
										<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
											{{ csrf_field() }}
											<input class="cart_quantity_input" type="number" min="1" name="cart_quantity" value="{{$v_content->qty}}" >
											<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
										</form>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">
										<?php
										$subtotal = $v_content->price * $v_content->qty;
										echo number_format($subtotal, 0, '.', '.');
										?>
									</p>
								</td>
								
								<td class="cart_delete">
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
									@if(Session::get('coupon'))
									<a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
									@endif
								</td>
								@if(Session::get('cart'))
								<td> </td>
								<td>
									<form method="POST" action="{{URL::to('/check-coupon')}}" >
										{{csrf_field()}}
										<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá" style=" margin-left:20px; width: 140px;">
										<input type="submit" class="btn btn-default check_out check_coupon" name="check_coupon" value="Tính mã giảm giá">
									</form>
								</td>
								@endif
							</tr>
						
						@endif
					</tbody>
				</table>
				</div>
				<div class="bill-to">
					<p>Điền thông tin gửi hàng</p>
					<div class="form-one">
						<form action="{{URL::to('/save-checkout-customer')}}" method="POST" >
							@csrf
							<input type="text" name="shipping_email" class="shipping_email" placeholder="Điền email">
							<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên người gửi">
							<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
							<input type="text" name="shipping_address" class="shipping_address" placeholder="Số nhà, đường ...">
							<textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
							@if(Session::get('fee'))
								<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
							@else 
								<input type="hidden" name="order_fee" class="order_fee" value="10000">
							@endif

							@if(Session::get('coupon'))
								@foreach(Session::get('coupon') as $key => $cou)
									<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
								@endforeach
							@else 
								<input type="hidden" name="order_coupon" class="order_coupon" value="no">
							@endif
							<div>
								<div class="form-group">
									<label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
									<select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
										<option value="0">Qua chuyển khoản</option>
										<option value="1">Thanh toán khi nhận hàng</option>   
									</select>
								</div>
							</div>
							@if(Session::get('matp') && Session::get('maqh') && Session::get('xaid'))
								<input name="order_matp" type="hidden" class="order_matp" value="{{Session::get('matp')}}">
								<input name="order_maqh" type="hidden" class="order_maqh" value="{{Session::get('maqh')}}">
								<input name="order_xaid" type="hidden" class="order_xaid" value="{{Session::get('xaid')}}">
							@endif

							<input type="button" value="Đặt hàng" name="send_order" class="btn btn-primary btn-sm send_order">
							<div class="row">
								<div style="margin-left: -30px;">
									<div class="total_area">
										<ul>
											<li>Tổng ({{Cart::count()}}) sản phẩm <span>{{Cart::priceTotal(0,',','.').' '.'VNĐ'}}</span></li>
											@php 
												$tam = Cart::priceTotal();
											@endphp
											@if(Session::get('coupon'))
												<li>Mã Giảm 
													@foreach(Session::get('coupon') as $key => $cou)
														<?php if($cou['coupon_condition']==1){ ?>
															({{$cou['coupon_number']}} %) 
															<p>@php 
																	$total_coupon = ($total*$cou['coupon_number'])/100;
																@endphp
															</p>
															<span style="margin-top: -30px;"> {{number_format($total_coupon,0,',','.')}} VNĐ </span>
															<p>@php 
																	$total_after_coupon = $subtotal-$total_coupon;
															@endphp</p>
															
															<?php }else{ ?>
															<span> {{number_format($cou['coupon_number'],0,',','.')}} VNĐ
															<p>
																@php 
																$total_coupon = $total - $cou['coupon_number'];
																@endphp
															</p>
																@php 
																	$total_after_coupon = $total_coupon;
																@endphp
														<?php } ?>
													@endforeach
													</span>
												</li>
											@endif
											<!-- <li>Thuế <span>{{Cart::tax(0,',','.').' '.'VNĐ'}}</span></li> -->
											@if(Session::get('fee'))
												<li>
													<a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a>	
													Phí vận chuyển <span>{{number_format(Session::get('fee'),0,',','.')}}</span>
												</li>
												<?php $total_after_fee = $total + Session::get('fee'); ?>
											@endif
											<li>Thành tiền<span>
												@php 
													if(Session::get('fee') && !Session::get('coupon')){
														$total_after = $total_after_fee;
														echo number_format($total_after,0,',','.').'đ';
													}elseif(!Session::get('fee') && Session::get('coupon')){
														$total_after = $total_after_coupon;
														echo number_format($total_after,0,',','.').'đ';
													}elseif(Session::get('fee') && Session::get('coupon')){
														$total_after = $total_after_coupon;
														$total_after +=  Session::get('fee');
														echo number_format($total_after,0,',','.').'đ';
													}elseif(!Session::get('fee') && !Session::get('coupon')){
														$total_after = 0;
														echo number_format($total_after,0,',','.').'đ';
													}

												@endphp</span>
											</li>
											<div class="col-md-12" style="margin-top:20px;">
											@php
													$vnd_to_usd = $total_after/23083;
											@endphp
												<div id="paypal-button"></div>
												<input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
											</div>	
										</ul>
									</div>
								</div>
							</div>
						</form>
						
							
								<!-- <input type="hidden" name="order_fee" class="order_fee" value="">
							
								<input type="hidden" name="order_fee" class="order_fee" value="10000">
							
								<input type="hidden" name="order_coupon" class="order_coupon" value="">
								
								<input type="hidden" name="order_coupon" class="order_coupon" value="no"> -->
							
					
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<form>
							{{csrf_field()}}
							<div class="form-group">
								<label for="exampleInputPassword1">Chọn thành phố</label>
								<select name="city" id="city" class="form-control input-sm m-bot15 choose city">
										<option value="">--Chọn tỉnh thành phố--</option>
									@foreach($city as $key => $ci)
										<option value="{{$ci->matp}}">{{$ci->name_city}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Chọn quận huyện</label>
									<select name="province" id="province" class="form-control input-sm m-bot15 province choose">
										<option value="">--Chọn quận huyện--</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Chọn xã phường</label>
									<select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
										<option value="">--Chọn xã phường--</option>   
									</select>
							</div>
							<input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
							
						</form>  
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
</section>
@endsection