@extends('layout')
@section('content')
<div class="col-sm-9 padding-right" style="width: 850px; " >
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Kết quả tìm kiếm</h2>
        @foreach($search_product as $key => $product)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                        <form>
                             <a href="{{URL::to('/chi-tiet')}}">
                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                <h2>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h2>
                                <p>{{$product->product_name}}</p>                             
                             </a>
                            <button class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                               Thêm giỏ hàng 
                            </button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
            </div>
        <style type="text/css">
            .product-image-wrapper h2{
                font-size: 16px;
            }
            .product-image-wrapper p{
                font-weight: bold;
            }
        </style>
@endsection