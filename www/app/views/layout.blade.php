<!DOCTYPE html>
<html>
<head>
    <title>{{isset($pretitle)?$pretitle:Config::get('shop.pretitle')}}
        {{isset($title)?$title:Config::get('shop.title')}}
        {{isset($suftitle)?$suftitle:Config::get('shop.suftitle')}}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap -->
    {{HTML::style('src/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('src/bootstrap/css/bootstrap-responsive.min.css')}}
    {{HTML::style('src/bootstrap/css/bootstrap-theme.min.css')}}
    {{HTML::style('src/bootstrap/css/datepicker.css')}}
    @if (isset($typeEnd) && $typeEnd=='admin')
    {{HTML::style('src/style.css')}}
    @endif
    {{HTML::style('src/'.Config::get('shop.theme').'/shop.css')}}
    @yield('morestyle')
</head>
<body>
@if (isset($haveHeader) && $haveHeader == 1)
@include(Config::get('shop.theme').'/layout/header')
@endif


    @if (isset($typeEnd) && $typeEnd=='admin')
        @include('admin/topnav')
    @else
    @include(Config::get('shop.theme').'/layout/topnav')
    @endif
<div class="clearfix"></div>
<div class=" body">
    @yield('body')
</div>
@include(Config::get('shop.theme').'/layout/footer')
<script src="http://code.jquery.com/jquery.js"></script>
{{HTML::script('src/bootstrap/js/bootstrap.min.js')}}
{{HTML::script('src/bootstrap/js/bootstrap-datepicker.js')}}
</body>
</html>
@yield('jscript')