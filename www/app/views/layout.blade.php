<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="src/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
</head>
<body>
@include('header')
<div class="content">
    @yield('body')
</div>
@include('footer')
<script src="http://code.jquery.com/jquery.js"></script>
<script src="src/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>