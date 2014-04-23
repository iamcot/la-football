<!DOCTYPE html>
<html>
<head>
    <title>{{isset($pretitle)?$pretitle:Config::get('shop.pretitle')}}
        {{isset($title)?$title:Config::get('shop.title')}}
        {{isset($suftitle)?$suftitle:Config::get('shop.suftitle')}}
    </title>
    <meta name="description" content="{{((isset($description))?$description:Config::get('shop.description'))}}">
    <meta name="keywords" content="{{((isset($keywords))?$keywords:'')}},{{Config::get('shop.keywords')}}">
    <meta name="robots" content="index,follow">
    <meta property="fb:app_id" content="753308934688020"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap -->
    {{HTML::style('src/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('src/bootstrap/css/bootstrap-responsive.min.css')}}
    {{HTML::style('src/bootstrap/css/bootstrap-theme.min.css')}}
    {{HTML::style('src/bootstrap/css/datepicker.css')}}
    @if (isset($typeEnd) && $typeEnd=='admin')
    {{HTML::style('src/style.css')}}
    @else
    {{HTML::style('src/'.Config::get('shop.theme').'/shop.css')}}
    @endif
    @yield('morestyle')
</head>
    <body class="{{((isset($error))?'bgwhite':'')}}">
    <div class="supercontainer">
        @yield('errorpage')
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
        @if(Session::has('message'))
        <div class="bg-danger text-center">{{Session::get('message')}}</div>
        @endif
        @yield('body')
    </div>
        <div class="clearfix"></div>
    @if (isset($typeEnd) && $typeEnd!='admin')
    @include(Config::get('shop.theme').'/layout/footer')
    @endif
    </div>
    </body>
    </html>
<script src="http://code.jquery.com/jquery.js"></script>
{{HTML::script('src/bootstrap/js/bootstrap.min.js')}}
{{HTML::script('src/bootstrap/js/bootstrap-datepicker.js')}}
@yield('jscript')
        @if (isset($typeEnd) && $typeEnd!='admin')
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_GB/all.js#xfbml=1&appId=753308934688020";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            window.fbAsyncInit = function() {
                // init the FB JS SDK
                FB.init({
                    appId      : '753308934688020',                        // App ID from the app dashboard
                    status     : true,                                 // Check Facebook Login status
                    xfbml      : true                                  // Look for social plugins on the page
                });
                FB.Event.subscribe('comment.create', comment_callback);
//                FB.Event.subscribe('comment.remove', comment_callback);
                // Additional initialization code such as adding Event Listeners goes here
            };
            var comment_callback = function(response) {
//                console.log(response);
                var url = response.href;
                var commentid = response.commentID;
//                FB.api(
//                    "/"+response.commentID+"?"+accesstoken,
//                    function (response) {
//                        console.log(response);
//                        if (response && !response.error) {
//
//                        }
//                    }
//                );
                $.ajax({
                    url:"{{URL::to('facelogin/savecomment')}}",
                    data:"laurl="+encodeURIComponent(url)+"&commentid="+commentid,
                    type:"post",
                    success:function(msg){

                    }
                });
            }
        </script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-49994822-1', 'webmypham.vn');
          ga('send', 'pageview');

        </script>
        @endif

