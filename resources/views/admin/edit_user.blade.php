@extends('layout')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thông tin
                        </header>
                        <div class="panel-body">
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.' </span>';
                                    Session::put('message', null);
                                }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-user')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Khách hàng</label>
                                    <input type="text" name="customer_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Năm Sinh</label>
                                    <input type="date" class="form-control" name="customer_namsinh" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email"  style="resize: none;" rows="1" class="form-control" name="customer_email" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <input type="number"  style="resize: none;" rows="1" class="form-control" name="customer_phone" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" >Trạng Thái</label>
                                    <select name="customer_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_user" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>


@endsection