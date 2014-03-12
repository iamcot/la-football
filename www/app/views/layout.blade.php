<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{HTML::style('src/bootstrap/css/bootstrap-responsive.css')}}
    {{HTML::style('src/football-style.css')}}
</head>
<body>
@include('header')
<div class="content">
    @yield('body')
</div>
@include('footer')
<script src="http://code.jquery.com/jquery.js"></script>
{{HTML::script('src/bootstrap/js/bootstrap.min.js')}}
</body>
</html>