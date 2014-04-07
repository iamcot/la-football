@extends('layout')
<body >
{{HTML::style('src/'.Config::get('shop.theme').'/shop.css')}}
@include(Config::get('shop.theme').'/layout/header')
@include(Config::get('shop.theme').'/layout/topnav')
<div class="supercontainer">
    <div class="body">
        <p class="bg404"></p>
        <div class="clearfix"></div>
    </div>
@include(Config::get('shop.theme').'/layout/footer')
</div>
</body>
<div id="fb-root"></div>
<script src="http://code.jquery.com/jquery.js"></script>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=141133079404451";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>