<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------Seo--------->
     <title>{{$meta_title}}</title>
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="" />
   
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>    
    <!-- <link rel="shortcut icon" href="{{('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">   -->
     <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">  
   
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
     <!-- gallery hình ảnh -->
     <link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
     <link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">
</head>
<style>
.menu-left-top{
    height: 150px;
    background-color: blue;
    border-radius: 10px;
}
.menu-left-bottom{
    margin-top: 5px;
    height: 150px;
    background-color: orange;
    border-radius: 10px;
    box-sizing: border-box;
}
.menu-right{
    height: 300px;
}
.menu-right .carousel-inner .item img{
    width: 100%;
    border-radius: 10px;
    height: 300px;
}
.menu-left-top .carousel-inner .item img{
    border-radius: 10px;
    width: 100%;
    height: 150px;
}
.menu-left-bottom .carousel-inner .item img{
    border-radius: 10px;
    width: 100%;
    height: 150px;
}

</style>
<body>  
    <header id="header">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 94* 4* 45 47</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> swatch@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook" style="color: black;"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" style="color: black;"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" style="color: black;"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble" style="color: black;"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" style="color: black;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left animate__animated animate__flip" style="padding-left:10px;
                        font-size:20px;">
                            <img src="{{asset('public/frontend/images/logo.png')}}"/>
                            <a href="{{URL::to('/trangchu')}}">
                                <b><i>SWatch</i></b>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                              
                                <?php
                                   $customer_id = Session::get('customer_id');
                                   $shipping_id = Session::get('shipping_id');
                                   if($customer_id!=NULL && $shipping_id==NULL){ 
                                 ?>
                                  <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                
                                <?php
                                 }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                 ?>
                                 <li><a href="{{URL::to('/tratien')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                 <?php 
                                }else{
                                ?>
                                 <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                                 }
                                ?>
                                
                                <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
                                <?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                                 ?>
                                  <li><a target="_blank" href="{{URL::to('/history')}}"><i class="fa fa-list"></i> Lịch sử mua hàng</a></li>
                                
                                <?php 
                                    }
                                 ?>

                               <?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                                 ?> 
                                 <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <i class="fa fa-solid fa-user"></i>
                                        <span class="badge bg-success">2</span>
                                    </a>
                                    <ul class="dropdown-menu extended tasks-bar">

                                        @foreach(\Illuminate\Support\Facades\DB::table('tbl_customers')->get() as $user)
                                            <li><a href="{{route('customer.infomation',$user->customer_id)}}"> Thông tin tài khoản</a></li>
                                        @endforeach

                                        <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                        
                                    </ul>
                                </li>
                                
                                <?php
                                    }else{
                                 ?>
                                 <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                 <?php 
                                    }
                                 ?>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trangchu')}}" class="active">Trang Chủ</a></li>
                                
                                <li><a href="contact-us.html">Thời Trang</a></li>
                                <li><a href="contact-us.html">Thể Thao</a></li>
                                <li><a href="contact-us.html">Định vị trẻ em</a></li>
                                <li><a href="#">Dây Đồng Hồ</i></a>
                                   
                                </li> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <form action="{{URL::to('/timkiem')}}" method="POST">
                            {{csrf_field()}}
                        <div class="search_box pull-right">
                            <input type="text" id="textarea" name="tukhoatimkiem" placeholder="Tìm kiếm sản phẩm"/>
                            <span class="microphone" id="btnTalk" ><i class="fa fa-microphone"></i></span>
                            <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-xs" value="Tìm kiếm">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <section id="slider">
        <div class="container">
            <div class="menu_slider">
                <div class="col-sm-5">
                    <div class="menu-left-top row">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#slider-carousel" data-slide-to="1"></li>
                                    <li data-target="#slider-carousel" data-slide-to="2"></li>
                                </ol>
                                
                                <div class="carousel-inner">
                                    <div class="item active">
                                            <img src="{{asset('public/frontend/images/banner1.jpg')}}" class="girl img-responsive"/>
                                    </div>
                                    <div class="item">
                                            <img src="{{asset('public/frontend/images/banner2.png')}}" class="girl img-responsive" alt="" />
                                    </div>
                                    <div class="item">
                                            <img src="{{asset('public/frontend/images/banner3.png')}}" class="girl img-responsive" alt="" />
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                    <div class="menu-left-bottom row">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                            </ol>
                            
                            <div class="carousel-inner">
                                <div class="item active">
                                        <img src="{{asset('public/frontend/images/banner5.png')}}" class="girl img-responsive" />
                                </div>
                                <div class="item">
                                        <img src="{{asset('public/frontend/images/banner4.png')}}" class="girl img-responsive" />
                                </div>
                                <div class="item">
                                        <img src="{{asset('public/frontend/images/banner6.png')}}" class="girl img-responsive" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="menu-right">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                        <img src="{{asset('public/frontend/images/banner7.jpg')}}" class="girl img-responsive" alt="" />
                                </div>
                                <div class="item">
                                        <img src="{{asset('public/frontend/images/banner8.jpg')}}" class="girl img-responsive" alt="" />
                                </div>
                                <div class="item">  
                                        <img src="{{asset('public/frontend/images/banner9.jpg')}}" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>BỘ LỌC</h2>
                        <div class="panel-group category-products" id="accordian">
                           <label for="amount">Sắp xếp theo </label>
                           <form>
                                @csrf
                                <select name="sort" id="sort" class="form-control">
                                    <option value="{{Request::url()}}?sort_by=none">---- Lọc ----</option>
                                    <option value="{{Request::url()}}?sort_by=tang_dan"> Giá tăng dần </option>
                                    <option value="{{Request::url()}}?sort_by=giam_dan"> Giá giảm dần </option>
                                    <option value="{{Request::url()}}?sort_by=tu_az">Lọc theo tên từ A - Z </option>
                                    <option value="{{Request::url()}}?sort_by=tu_za"> Lọc theo tên từ Z - A </option>
                                </select>   
                           </form>
                           <label for="amount">Lọc theo giá tiền </label>
                           <form>
                               <div id="slider-range" ></div>
                               <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                               <input type="hidden"  name="start_price" id="start_price" >
                               <input type="hidden" name="end_price" id="end_price" > 
                               <br>
                                <input type="submit" name="filter_price" value="Lọc giá" class="btn btn-sm btn-default"> 
                            </form>
                        </div><!--/category-products-->

                        <h2>LOẠI SẢN PHẨM</h2>
                        <div class="panel-group category-products" id="accordian">
                           @foreach($category as $key => $cate)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                                </div>
                            </div>
                           @endforeach
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $brand)
                                           <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Trợ giúp trực tuyến</a></li>
                                <li><a href="#">Liên hệ chúng tôi</a></li>
                                <li><a href="#">Tình trạng đặt hàng </a></li>
                                <li><a href="#">Thay đổi địa điểm</a></li>
                                <li><a href="#">Câu hỏi thường gặp</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3"   >
                        <div class="single-widget">
                            <h2>Chính Sách</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Chính sách hoàn lại tiền</a></li>
                                <li><a href="#">Hệ thống thanh toán</a></li>
                                <li><a href="#">Hệ thống vé</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Cửa Hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin công ty</a></li>
                                <li><a href="#">Tuyển dụng</a></li>
                                <li><a href="#">Vị trí cửa hàng</a></li>
                                <li><a href="#">Chương trình liên kết</a></li>
                                <li><a href="#">Bản quyền</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Địa chỉ email của bạn" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom" style="height: 10px;">
        </div>
        
    </footer><!--/Footer-->
    
     

    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    
    <script src="{{asset('public/frontend/js/main.js')}}"></script> 
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
    
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- checkout paypal -->
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!-- galerry hình ảnh -->
    <script  type="text/javascript"  src="{{asset('public/frontend/js/lightGallery.js')}}"></script>
    <script  type="text/javascript"  src="{{asset('public/frontend/js/lightGallery.min.js')}}"></script>
    <script  type="text/javascript"  src="{{asset('public/frontend/js/prettify.js')}}"></script>
    
    <script  type="text/javascript">
        $(document).ready(function() {
            $(document).ready(function() {
                $('#imageGallery').lightSlider({
                    gallery:true,
                    item:1,
                    loop:true,
                    thumbItem:3,
                    slideMargin:0,
                    
                    enableDrag: false,
                    currentPagerPosition:'left',
                    onSliderLoad: function(el) {
                        el.lightGallery({
                            selector: '#imageGallery .lslide'
                        });
        }   
    });  
  });
    });
  </script>
  <!-- 
    <script type="text/javascript">
    $.validate({

    });
    </script> -->
<script>
    var usd = document.getElementById("vnd_to_usd").value;
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
        sandbox: 'demo_sandbox_client_id',
        production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>
<!-- tìm kiếm bằng giọng nói -->
<script type="text/javascript">
    $(document).ready(function(){
       
        $('.microphone').click(function(){
            var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
            var recognition = new SpeechRecognition();
            recognition.lang = 'vi-VN';

            var TextBox = $("#textarea");

            var content = "";
            // recognition.continuous = true;

            recognition.onresult = function(event) {
                var current =  event.results.length - 1;

                var transcript = event.results[current][0].transcript;
                content += transcript;
                TextBox.val(content);
            };

            console.log(content);

            recognition.onspeechend = function() {
                recognition.stop();
            };

            recognition.onerror = function(event) {
                message.textContent = 'Error occurred in recognition: ' + event.error;
            }

            document.querySelector('#btnTalk').addEventListener('click', function(){
                recognition.start();
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $( "#slider-range" ).slider({
            orientation: "horizontal",
            range: true,
            min: 500,
            max: 20000,
            step: 500,
            values: [ 5000, 15000],
            
            slide: function( event, ui ) {
                $( "#amount" ).val( ui.values[ 0 ] + "Đ - " + ui.values[ 1 ] + "Đ");
                $( "#start_price" ).val( ui.values[ 0 ]);
                $( "#end_price" ).val( ui.values[ 1 ]);
            }
        });
            $( "#amount" ).val(  $( "#slider-range" ).slider( "values", 0 ) +
        "Đ  -  " + $( "#slider-range" ).slider( "values", 1 ) +"Đ" );
    });
</script>
<script>
    $(document).ready(function(){
        $('#sort').on('change', function(){
            var url = $(this).val();
            if(url){
                window.location = url;
            }
            return false;
        })
    })

</script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp == '' && maqh =='' && xaid ==''){
                alert('Làm ơn chọn để tính phí vận chuyển');
            }else{
                $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(data){
                        location.reload();
                    }
                });
            } 
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        // swal({
        //     title: "Xác nhận đơn hàng",
        //     text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
        //     type: "warning",
        //     showCancelButton: true,
        //     confirmButtonClass: "btn-danger",
        //     confirmButtonText: "Mua hàng",

        //     cancelButtonText: "Hủy",
        //     closeOnConfirm: false,
        //     closeOnCancel: false
        // },
        // function(isConfirm){
        //     if (isConfirm) {
        $('.send_order').click(function(){
                var shipping_email = $('.shipping_email').val();
                var shipping_name = $('.shipping_name').val();
                var shipping_address = $('.shipping_address').val();
                var order_matp = $('.order_matp').val();
                var order_maqh = $('.order_maqh').val();
                var order_xaid = $('.order_xaid').val();
                var shipping_phone = $('.shipping_phone').val();
                var shipping_notes = $('.shipping_notes').val();
                var shipping_method = $('.payment_select').val();
                var order_fee = $('.order_fee').val();
                var order_coupon = $('.order_coupon').val();
                var _token = $('input[name="_token"]').val();
                var product_id = $('.product_id').val();
                var product_name = $('.product_name').val();
                var product_price = $('.product_price').val();
                var product_sales_quantity =$('.product_sales_quantity').val();
                $.ajax({
                    url: '{{url('/confirm-order')}}',
                    method: 'POST',
                    data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,
                        shipping_phone:shipping_phone,shipping_notes:shipping_notes,
                        _token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method,
                        product_id:product_id,  product_name: product_name,product_price:product_price,product_sales_quantity:product_sales_quantity,
                        order_matp:order_matp,order_maqh:order_maqh,order_xaid:order_xaid,
                    },
                    success:function(){
                        swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");

                        location.reload(); 
                    }
                });

                // window.setTimeout(function(){ 
                //     location.reload();
                // } ,1000);

                // } else {
                // swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                // }
            });
    });

    </script>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "112453991801831");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
</html>