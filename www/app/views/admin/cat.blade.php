@extends('layout')
@section('body')
        <div class="col-xs-12">
            {{--*/ $adminNav = Config::get('admin.adminnav') /*--}}
            {{--*/ $strActCat = $adminNav[$actCat] /*--}}
            <h2><strong>{{trans('common.LD'.$sidecat)}} {{trans('common.'.$strActCat['title'])}}</strong></h2>

        </div>

        <div class="col-xs-12 row-fluid">
            @if (!isset($sidecat) || $sidecat=='view')
            @include('admin/catview')
            @else
            @include('admin/catcreate')
            @endif
            <div class="clearfix"></div>
            <br>
        </div>

@stop