@extends('layout')
@section('body')
<div class="container-fluid wrap">
    @include(Config::get('shop.theme').'/layout/barcum')
    <div id="content" class="{{$sidebartype}}">
        @yield('pagecontent')
    </div>
    @include(Config::get('shop.theme').'/layout/sidebar')
</div>
@stop