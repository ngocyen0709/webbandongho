@extends('layout')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" align="center">
     Thông tin đăng nhập
    </div>
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->customer_phone}}</td>
            <td>{{$customer->customer_email}}</td>
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading" align="center">
     Thông tin vận chuyển hàng
    </div>
    
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên người vận chuyển</th>
            <th>Số nhà</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ghi chú</th>
            <th>HTTT</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
           
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_address}},{{$xp->name_xaphuong}}, {{$qh->name_quanhuyen}}, {{$tp->name_city}} </td>
             <td>{{$shipping->shipping_phone}}</td>
             <td>{{$shipping->shipping_email}}</td>
             <td>{{$shipping->shipping_notes}}</td>
             <td>@if($shipping->shipping_method==0) Chuyển khoản @else Tiền mặt @endif</td>
            
          
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br><br>

<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading" align="center">
      Liệt kê chi tiết đơn hàng
    </div>
   
    <div class="table-responsive">
    <?php
          $message = Session::get('message');
          if($message){
              echo '<span class="text-alert">'.$message.'</span>';
              Session::put('message',null);
          }
    ?>
    
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th style="width: 100px;">SL kho</th>
            <th>Mã giảm giá</th>
            <th>Phí ship</th>
            <th>Số lượng</th>
            <th>Giá SP</th>
            <th>Tổng tiền</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @php 
              $i = 0;
              $total = 0;
            @endphp
            @foreach($order_details as $key => $details)

            @php 
              $i++;
              $subtotal = $details->product_price*$details->product_sales_quantity;
              $total+=$subtotal;
            @endphp
          <tr class="color_qty_{{$details->product_id}}" >
           
            <td><i>{{$i}}</i></td>
            <td style="width: 200px;">{{$details->product_name}}</td>
            <td style="width: 100px;">{{$details->product->product_quantity}}</td>
            <td>@if($details->product_coupon!='no')
                  {{$details->product_coupon}}
                @else 
                  Không mã
                @endif
            </td>
            <td>{{number_format($details->product_feeship ,0,',','.')}}đ</td>
            <td>
              <input type="number" min="1" {{$order_status==2 ? 'disabled' : ' ' }} class="order_qty_{{$details->product_id}}" value="{{$details->product_sales_quantity}}" style="width: 40px;" name="product_sales_quantity">
              
              <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product->product_quantity}}">
              
              <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
              
              
              <input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">
             
            </td> 
            <td>{{number_format($details->product_price ,0,',','.')}}đ</td>
            <td>{{number_format($subtotal ,0,',','.')}}đ</td>
          </tr>
        @endforeach
        <tr>
            <td colspan="8">  
              @php 
                $total_coupon = 0;
              @endphp
              @if($coupon_condition==1)
                  @php
                  $total_after_coupon = ($total*$coupon_number)/100;
                  echo 'Tổng giảm :'.number_format($total_after_coupon,0,',','.').'</br>';
                  $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
                  @endphp
              @else 
                  @php
                  echo 'Mã giảm :'.number_format($coupon_number,0,',','.').' VNĐ'.'</br>';
                  $total_coupon = $total + $details->product_feeship - $coupon_number ;

                  @endphp
              @endif

              Phí ship : {{number_format($details->product_feeship,0,',','.')}} VNĐ</br> 
             Thanh toán: {{number_format($total_coupon,0,',','.')}} VNĐ
            </td>
          </tr>
        
        </tbody>
      </table>
      
    </div>
  </div>
</div>
@endsection