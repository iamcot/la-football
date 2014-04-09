@extends('layout')
@section('body')
{{--*/ $categories = Vcategory::getCategoriesTree(); /*--}}
<div class="container-fluid wrap ">
    <div id="content" class=" col-xs-12 {{(($sidebartype=='none')?'col-sm-12':'col-sm-8 col-md-9')}} {{$sidebartype}} {{(($typeEnd == 'list' || $typeEnd=='details' ||  $typeEnd=='cart')?'bgwhite':'')}}">
        @if($typeEnd == 'list' || $typeEnd=='details')
        @include(Config::get('shop.theme').'/layout/barcum')
        @endif
        @yield('pagecontent')
    </div>
    @include(Config::get('shop.theme').'/layout/sidebar')
</div>
@stop
