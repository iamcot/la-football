@extends('layout')
@section('body')
    <div class="span12">
        {{--*/ $adminNav = Config::get('admin.adminnav') /*--}}
        {{--*/ $strActCat = $adminNav[$actCat] /*--}}
        <h2><strong>{{trans('common.LD'.$sidecat)}} {{trans('common.'.$strActCat['title'])}}</strong></h2>

    </div>

    <div class="col-xs-12">
            @if (!isset($sidecat) || $sidecat=='view')
            @include('admin/productview')
            @else
            @include('admin/productcreate')
            @endif

    </div>
@stop
@section('jscript')
@stop