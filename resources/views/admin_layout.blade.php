<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{csrf_token()}}"/>
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('public/backend/css/font-awesome.css')}}" > 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<!-- chart -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> 



</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        SWatch
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="#">
                <?php
                $name = Session::get('admin_name');
                if($name){
                	echo $name;
                }
                ?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Hồ Sơ</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Cài Đặt</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng Quan</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản Lý Khách Hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-user')}}">Thêm Khách Hàng</a></li>
						<li><a href="{{URL::to('/all-user')}}">Liệt Kê Khách hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Quản lí đơn hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý mã giảm giá</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/insert-coupon')}}">Thêm mã giảm giá</a></li>
                    </ul>
                    <ul class="sub">
						<li><a href="{{URL::to('/list-coupon')}}">Liệt kê mã giảm giá</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('/all-product')}}">Liệt Kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Loại Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm Loại Sản Phẩm</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt Kê Loại Sản Phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương Hiệu Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Liệt Kê thương hiệu sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Nhà Cung Cấp</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Danh Sách NCC</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý vận chuyển</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/delivery')}}">Thêm Vận chuyển</a></li>
                    </ul>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
</section>
 
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<!-- datepicker -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!-- chart -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
        load_gallery();
        function load_gallery(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name="_token"]').val();
            // alert(pro_id);
            $.ajax({
                url : "{{URL::to('/select-gallery')}}",
                method: 'POST',
                data:{pro_id:pro_id,_token:_token},
                success:function(data){
                   $('#gallery_load').html(data);
                }
            });
            $('#file').change(function(){
                var error = '';
                var files = $('#file')[0].files;

                if(files.length > 5){
                    error += '<p>Bạn chỉ được chọn tối đa 5 ảnh!</p>'
                }else if( files.length ==''){
                    error += '<p>Vui lòng chọn ảnh!</p>'
                }else if( files.size > 2000000){
                    error += '<p>Kích thước ảnh lớn hơn 2MB!</p>'
                }

                if(error == ''){

                }else{
                    $('#file').val('');
                    $('#error_gallery').html('<span class="text-danger">'+ error + ' </span>');  
                    return false;  
                }
            });
            $(document).on('blur', '.edit_gal_name',function(){
                var gal_id = $(this).data('gal_id');
                var gal_text = $(this).text();
                var _token = $('input[name="_token"]').val();
                // alert(gal_id);
                // alert( gal_text);
                $.ajax({
                url : "{{URL::to('/update-gallery-name')}}",
                method: 'POST',
                data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Cập nhật thành công!</span>');  
                }
                });
            });
            $(document).on('click', '.delete-gallery',function(){
                var gal_id = $(this).data('gal_id');
                var _token = $('input[name="_token"]').val();
                if(confirm('Bạn muốn xóa ảnh này không!')){
                    $.ajax({
                        url : "{{URL::to('/delete-gallery')}}",
                        method: 'POST',
                        data:{gal_id:gal_id,_token:_token},
                        success:function(data){
                            load_gallery();
                            $('#error_gallery').html('<span class="text-danger">Xóa thành công!</span>');  
                        }
                    });
                }    
            });
            $(document).on('change', '.file_image',function(){
                var gal_id = $(this).data('gal_id');
                var image = document.getElementById('file-'+gal_id).files[0];

                var form_data = new FormData();
                form_data.append("file",document.getElementById('file-'+gal_id).files[0]);
                form_data.append("gal_id",gal_id );

                    $.ajax({
                        url : "{{URL::to('/update-gallery')}}",
                        method: 'POST',
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:form_data,
                        contentType:false,
                        cache: false,
                        processData: false,

                        success:function(data){
                            load_gallery();
                            $('#error_gallery').html('<span class="text-danger">Cập nhật ảnh thành công!</span>');  
                        }
                    });   
            });
        }
    });
</script>
<script type="text/javascript">
        $(document).ready(function(){
            fetch_delivery();
            function fetch_delivery(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:'{{url('/select-feeship')}}',
                    method:'POST', //post phải có token
                    data:{_token:_token},
                    success:function(data){
                        $('#load_delivery').html(data);
                    }
                });
            }

            $(document).on('blur', '.fee_feeship_edit', function(){
                var feeship_id = $(this).data('feeship_id');
                var feeship_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:'{{url('/update-delivery')}}',
                    method:'POST',
                    data:{feeship_id:feeship_id,feeship_value:feeship_value,_token:_token},
                    success:function(data){
                        fetch_delivery();
                    }
                });
            });

            $('.add_delivery').click(function(){
                var city = $('.city').val();
                var province = $('.province').val();
                var ward = $('.wards').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
                
                $.ajax({
                    url:'{{url('/insert-delivery')}}',
                    method:'POST',
                    data:{city:city,province:province,ward:ward,fee_ship:fee_ship,_token:_token},
                    success:function(data){
                        fetch_delivery();
                    }
                });
            });
            
            $('.choose').on('change', function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                
                if(action == 'city'){
                    result = 'province';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url:'{{url('/select_delivery')}}',
                    method:'POST',
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
    
        var chart = new Morris.Bar({
            element: 'myfirstchart',

            LineColors: ['#000', '#fc8710'],
            parseTime: false,
            hideHover: 'auto',
            
            xkey: 'period',

            ykeys: ['order','sales','profit','quantity'],

            labels: ['Đơn hàng','Doanh số','Lợi nhuận','Số lượng']
        });
        
        $('.dashboard-filter').change(function(){
                var _token = $('input[name="_token"]').val();
                var dashboard_value = $(this).val();
                
                $.ajax({
                    url: '{{url('/dashboard-filter')}}',
                    method: "POST",
                    dataType: "JSON",
                    data:{dashboard_value:dashboard_value, _token:_token},
                    success:function(data)
                    {
                        chart.setData(data);
                    }
                });
        });
        $('#btn-dashboard-filter').click(function(){
                var _token = $('input[name="_token"]').val();

                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();

                $.ajax({
                    url:'{{url('/filter-by-date')}}',
                    method: "POST",
                    dataType: "JSON",
                    data:{from_date:from_date, to_date:to_date, _token:_token},
                    success:function(data)
                    {
                        chart.setData(data);
                    }
                });
        });
    });
</script>
<script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
        //alert(order_product_id);
        $.ajax({
                url : '{{url('/update-qty')}}',

                method: 'POST',

                data:{_token:_token, order_product_id:order_product_id ,order_qty:order_qty ,order_code:order_code},
                // dataType:"JSON",
                success:function(data){

                    alert('Cập nhật số lượng thành công');
                 
                   location.reload();
                }
        });

    });
</script>
<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

        //lay ra so luong
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            //so luong khach dat
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
            //so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

            if(parseInt(order_qty) > parseInt(order_qty_storage)){
                j = j + 1;
                if(j==1){
                    alert('Số lượng bán trong kho không đủ');
                }
                $('.color_qty_'+order_product_id[i]).css('background','#000');
            }
        }
        if(j==0){
          
                $.ajax({
                        url : '{{url('/update-order-qty')}}',
                            method: 'POST',
                            data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                            success:function(data){
                                alert('Thay đổi tình trạng đơn hàng thành công');
                                location.reload();
                            }
                });
            
        }

    });
</script>
<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
<!-- tinh phi van chuyen -->
<script type="text/javascript">
    $(document).ready(function(){
        fetch_delivery();
        function fetch_delivery(){//LẤY dữ liệu bằng jax
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : "{{URL::to('/select-feeship')}}",
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
        
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                fetch_delivery();
                }
            });
        });
        $('.add_delivery').click(function(){
            var city = $('.city').val();
            var province = $('.province').val();
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
    
            $.ajax({
                url : "{{URL::to('/insert-delivery')}}",
                method: 'POST',
                data:{city:city, province:province, wards:wards, fee_ship:fee_ship, _token:_token},
                success:function(data){
                    fetch_delivery();
                }
            });

        });
        $('.choose').on('change', function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                // alert(action);
                // alert(ma_id);
                // alert(_token);
                
                if(action == 'city'){
                    result = 'province';
                }else{
                    result = 'ward';
                }
                $.ajax({
                    url:'{{url('/select_delivery')}}',
                    method:'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
              });
        });
    });
</script> 

<!-- tinh phi van chuyen -->
<script type="text/javascript">
	$.validate({

	});
</script>
<!-- <script>
	CKEDITOR.replace('ckeditor');
	CKEDITOR.replace('ckeditor1');
</script> -->

<!-- <script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script> -->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
    <script type="application/x-javascript"> 
    addEventListener("load", function() 
    { setTimeout(hideURLbar, 0); }, 
    false); 
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //calendar -->
</body>
</html>
