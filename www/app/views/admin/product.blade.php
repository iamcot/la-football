@extends('layout')
@section('body')
    <div class="span12">
        <ul class="nav nav-pills">
                <li><a class="list-group-item @if(!isset($sidecat) || $sidecat=='view') active @endif" href="{{url('admin/product')}}">Xem</a></li>
                <li><a class="list-group-item @if(isset($sidecat) && $sidecat=='create') active @endif"  href="{{url('admin/product/create')}}">Tạo / Sửa </a></li>
        </ul>
    </div>
    <div class="clearfix"></div><br>
    <div class=" panel panel-default">
         {{--*/ $adminNav = Config::get('admin.adminnav') /*--}}
         {{--*/ $strActCat = $adminNav[$actCat] /*--}}

        <div class="panel-heading">{{trans('common.LD'.$sidecat)}} {{trans('common.'.$strActCat['title'])}}</div>
        <div class="panel-body">
            @if (!isset($sidecat) || $sidecat=='view')
            @include('admin/productview')
            @else
            @include('admin/productcreate')
            @endif
        </div>

    </div>
@stop
@section('jscript')
@stop