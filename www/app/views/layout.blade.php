<!DOCTYPE html>
<html>
<head>
    <title>{{isset($pretitle)?$pretitle:Config::get('shop.pretitle')}}
        {{isset($title)?$title:Config::get('shop.title')}}
        {{isset($suftitle)?$suftitle:Config::get('shop.suftitle')}}
    </title>
    <meta property="fb:app_id" content="141133079404451"/>
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
@if (isset($typeEnd) && $typeEnd!='admin')
@include(Config::get('shop.theme').'/layout/footer')
@endif
<script src="http://code.jquery.com/jquery.js"></script>
{{HTML::script('src/bootstrap/js/bootstrap.min.js')}}
{{HTML::script('src/bootstrap/js/bootstrap-datepicker.js')}}
</body>
</html>
@if (isset($typeEnd) && $typeEnd!='admin')
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=141133079404451";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    $(document).ready(function() {
            FB.Event.subscribe('comment.create', comment_callback);
            FB.Event.subscribe('comment.remove', comment_callback);
    });
//    window.fbAsyncInit = function() {
//        FB.init({
//            appId      : '141133079404451',
//            status     : true,
//            xfbml      : true
//        });
//    };
    var comment_callback = function(response) {
//        console.log("comment_callback");
//        console.log(response);
//        var accesstoken = "access_token=141133079404451|5mLCw1V_YriA32aJ10OhTdH2hO8";
//        $.ajax({
//            url:"https://graph.facebook.com/1669855124/notifications?"+accesstoken+"&template=Have a comment from webmypham&href={{Request::url()}}",
//            type:"post",
//            success:function(msg){
//                console.log(msg);
//            }
//        });
    }
</script>
@endif
@yield('jscript')
