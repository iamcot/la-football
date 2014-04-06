<div class="navbar nav-pink navbar-static-top " role="navigation">
    <div class="container-fluid wrap">
        <div class="navbar-inner">
            <div id="facebookprofile" class="pull-right">
                @include("user")
            </div>
            <ul class="nav navbar-nav">
                @foreach (Config::get('shop.topnav') as $navitem)
                <li @if (isset($actCat) && $actCat == $navitem['id']) class="active" @endif >
                <a href="{{URL::to($navitem['url'])}}"><span class="{{$navitem['icon']}}"></span> {{$navitem['title']}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>