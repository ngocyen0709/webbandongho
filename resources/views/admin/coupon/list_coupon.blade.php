@extends('admin_layout')
@section('admin_content')
<link rel="stylesheet" href="{{asset('public/backend/fontawesome/css/all.min.css')}}" type="text/css"/>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
    </div>
    
    <div class="table-responsive">
        <?php
            $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.' </span>';
                    Session::put('message', null);
                    }
        ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng mã</th>
            <th>Giảm theo</th>
            <th>Giá trị mã</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($coupon as $key => $cou)
          <tr>
            
            <td>{{$cou -> coupon_name}}</td>
            <td>{{$cou -> coupon_code}}</td>
            <td>{{$cou -> coupon_time}}</td>

            <td><span class="text-ellipsis">
                <?php
                    if($cou->coupon_condition == 1){
                ?>
                   Giảm theo %
                <?php
                    }else{
                ?>
                    Giảm theo tiền
                <?php
                }
                ?>

            </span></td>
            <td><span class="text-ellipsis">
                <?php
                    if($cou->coupon_condition == 1){
                ?>
                   Giảm {{$cou->coupon_number}} %
                <?php
                    }else{
                ?>
                    Giảm {{$cou->coupon_number}} tiền
                <?php
                }
                ?>

            </span></td>
            <td>
                <a onclick="return confirm('Bạn có chắc muốn xóa!')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                </a>
            </td>    
          </tr>
          @endforeach
          
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection