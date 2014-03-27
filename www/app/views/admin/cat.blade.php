@extends('layout')
@section('body')
    <div class="span3 sidenav">
        <ul class="nav nav-list">
            <li class="nav-header">Thao tác</li>
            <li class="@if(!isset($sidecat) || $sidecat=='view') active @endif">
                <a href="{{url('admin/cat')}}">Xem<i class="icon-chevron-right"></i></a>
            </li>
            <li class="@if(isset($sidecat) && $sidecat=='create') active @endif">
                <a  href="{{url('admin/cat/create')}}">Tạo / Sửa <i class="icon-chevron-right"></i></a>

            </li>
        </ul>
    </div>
    <div class="span8">
         {{--*/ $adminNav = Config::get('admin.adminnav') /*--}}
         {{--*/ $strActCat = $adminNav[$actCat] /*--}}

        <h3>{{trans('common.LD'.$sidecat)}} {{trans('common.'.$strActCat['title'])}}</h3>
        @if (!isset($sidecat) || $sidecat=='view')
            @include('admin/catview')
        @else
            @include('admin/catcreate')
        @endif
    </div>
@stop
@section('jscript')
     <script>
        function load(table){

        }
     </script>
@stop