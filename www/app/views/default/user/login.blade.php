@extends('layout')
@section('body')
<div class="container-fluid wrap ">
    <div id="content">

        <div class="row-fluid loginbox" style="">
        {{Form::open(array(
        "url" => "login",
        "autocomplete"=>"off",
            'class'=>'form-horizontal',
        )) }}
            <div class="form-group">
                <span class="col-sm-3 control-label text-left">Tài khoản</span>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Tên tài khoản" name="username">
                </div>
            </div>
            <div class="form-group">
                <span class="col-sm-3 control-label text-left">Mật khẩu</span>
                <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                </div>
            </div>
            <div class="form-group col-sm-12 text-center">
                {{Form::submit("Đăng nhập",array('class'=>'btn btn-success')) }}
            </div>
        {{Form::close() }}
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@stop