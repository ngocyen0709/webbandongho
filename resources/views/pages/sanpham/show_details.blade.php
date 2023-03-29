@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
			<h3>ZOOM</h3>
		</div>
	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="" />
				<h2>{{$value->product_name}}</h2>
				<p>Mã ID: {{$value->product_id}}</h2>
				<p>Thông tin chi tiết: </br> {{$value->product_content}}</p>
				<img src="images/product-details/rating.png" alt="" />
				
			<form action="{{URL::to('/save-cart')}}" method="POST">
				{{csrf_field()}}
				<span>
					<span>{{number_format($value->product_price,0,',','.').' '.'VNĐ'}}</span>

					<label>Số lượng:</label>
					<input name="qty" type="number" min="1" max="{{$value->product_quantity}}" class="cart_product_qty_{{$value->product_id}}"  value="1" />
					
					<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
					<input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">
					<button type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Thêm giỏ hàng
					</button>
				</span>
			</form> 
			<!-- <form action="{{URL::to('/save-cart')}}" method="POST">
				@csrf
				<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

                        <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                        <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">

                        <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

                        <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                      
						<span>
							<span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
						
							<label>Số lượng:</label>
							<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
							<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
						</span>
						<input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
			</form> -->
			<p><b>Số lượng hàng trong kho:</b> Còn hàng</p>
			<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
			<p><b>Danh mục:</b> {{$value->category_name}}</p>
			<p><b>Nhà cung cấp:</b> Hàng mới 100%</p>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div>

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
			<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
			<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade" id="details" >
			<p>{!!$value->product_desc!!}</p>
		</div>
		
		<div class="tab-pane fade" id="companyprofile" >
			<p>{!!$value->product_content!!}</p>
		</div>
		
		<div class="tab-pane fade active in" id="reviews" >
			<div class="col-sm-12">
				<!-- <ul>
					<li><a href=""><i class="fa fa-user"></i></a></li>
					<li><a href=""><i class="fa fa-clock-o"></i></a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i></a></li>
				</ul> -->
				<p style="font-size:20px  ;line-height: 35px;">
					1.Giảm 20% gói Bảo hành Mở rộng 12 tháng (click xem chi tiết).<br>
					2.Nhập mã SPPMWG giảm 10% tối đa 100.000đ khi thanh toán qua Ví ShopeePay.<br>

					3.Nhập mã MWG18 giảm 3% tối đa 100.000đ khi thanh toán quét QRcode qua App của ngân hàng<br></p>
				<p><b>Hãy Viết đánh giá của bạn:</b></p>
				
				<form action="#">
					<span>
						<input type="text" placeholder="Họ và Tên"/>
						<input type="email" placeholder="Email"/>
					</span>
					<textarea name="" ></textarea>
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('cart').click(function(){
			alert('Thành Công!');
		});
	})

</script>
@endforeach
@endsection