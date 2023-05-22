@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thư viện ảnh
                        </header>
                        <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.' </span>';
                                    Session::put('message', null);
                                }
                            ?>
                        <div class="panel-body">
                            <input type="hidden" value="{$pro_id}" name="pro_id" class="pro_id">

                            <div id="gallery_load">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tên Hình ảnh</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                            </table>
                            </div>
                        </div>
                    </section>

            </div>
        </div>


@endsection