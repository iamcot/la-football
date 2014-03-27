<!DOCTYPE html>
<html>
<head>
    <title>{{isset($pretitle)?$pretitle:Config::get('shop.pretitle')}}
        {{isset($title)?$title:Config::get('shop.title')}}
        {{isset($suftitle)?$suftitle:Config::get('shop.suftitle')}}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{HTML::style('src/bootstrap/css/bootstrap.css')}}
    {{HTML::style('src/bootstrap/css/bootstrap-responsive.css')}}
    {{HTML::style('src/style.css')}}
</head>
<body>
@if (isset($haveHeader) && $haveHeader == 1)
@include('header')
@endif


    @if (isset($typeEnd) && $typeEnd=='admin')
        @include('admin/topnav')
    @else
    @include('topnav')
    @endif
<div class="clearfix"></div>
<div class="container-fluid body">
    @yield('body')
</div>
@include('footer')
<script src="http://code.jquery.com/jquery.js"></script>
{{HTML::script('src/bootstrap/js/bootstrap.min.js')}}
</body>
</html>
@yield('jscript')