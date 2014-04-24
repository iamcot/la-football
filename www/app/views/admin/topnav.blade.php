<div class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container-fluid">
    <div class="navbar-inner">
        <h3 class="navbar-text">Quản trị</h3>
            <ul class="nav navbar-nav">
                @foreach (Config::get('admin.adminnav') as $navitem)
                <li
                    @if (isset($actCat) && $actCat == $navitem['id'])
                      class="active"
                    @endif
                >
                    {{link_to('admin/'.$navitem['url'],trans('common.'.$navitem['title']))}}
                </li>
                @endforeach
            </ul>
        <ul class="nav navbar-nav navbar-right" id="facebookprofile" style="color:#fff">
            <li>{{Auth::user()->lafullname}}</li>
            <li><a href="{{URL::to('logout')}}" style="display: inline">Logout</a> </li>
        </ul>
    </div>
    </div>
</div>