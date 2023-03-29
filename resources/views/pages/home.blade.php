@extends('layout')
@section('content')
<div class="features_items">
    <h2 class="title text-center">Sản Phẩm Mới</h2>
    @foreach($all_product as $key => $product)
    <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                <form action="{{URL::to('/save-cart')}}" method="POST">
                    {{csrf_field()}}
                    
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                        <h2>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h2>
                        <p>{{$product->product_name}}</p>
                    </a>
                    <span>
                        <input name="qty" type="hidden" min="1" class="cart_product_qty_{{$product->product_id}}"  value="1" />
                        <input name="productid_hidden" type="hidden"  value="{{$product->product_id}}" />
                        <button type="submit" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Thêm giỏ hàng
                        </button>
				    </span>
                </form>
                 
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>
        <style type="text/css">
            .product-image-wrapper h2{
                font-size: 16px;
            }
            .product-image-wrapper p{
                font-weight: bold;
            }
            .productinfo img{
                width: 80%;
                height: 160px;
            }
        </style>
@endsection