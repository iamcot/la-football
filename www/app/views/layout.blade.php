<!DOCTYPE html>
<html>
<head>
    <title>{{isset($title)?$title:Config::get('shop.title')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{HTML::style('src/bootstrap/css/bootstrap-responsive.css')}}
    {{HTML::style('src/style.css')}}
</head>
<body>
@if (isset($haveHeader) && $haveHeader == 1)
@include('header')
@endif
<div class="content">
    @yield('body')
</div>
@include('footer')
<script src="http://code.jquery.com/jquery.js"></script>
{{HTML::script('src/bootstrap/js/bootstrap.min.js')}}
</body>
</html>