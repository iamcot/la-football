<div class="navbar nav-pink navbar-static-top hidden-print" role="navigation">
    <div class="container-fluid wrap">
        <div class="navbar-inner">

            <ul class="nav navbar-nav">
                @foreach (Config::get('shop.topnav') as $navitem)
                <li @if (isset($actCat) && $actCat == $navitem['id']) class="active" @endif >
                <a href="{{URL::to($navitem['url'])}}"><span class="{{$navitem['icon']}}"></span> <span class="hidden-sm hidden-xs">{{$navitem['title']}}</span></a>
                </li>
                @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right" id="facebookprofile">
                @include("user")
            </ul>
        </div>
    </div>
</div>