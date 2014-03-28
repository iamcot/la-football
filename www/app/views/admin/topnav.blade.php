<div class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container-fluid">
    <div class="navbar-inner">
            <ul class="nav navbar-nav">
                @foreach (Config::get('admin.adminnav') as $navitem)
                <li
                    @if (!isset($actCat) || $actCat == $navitem['id'])
                      class="active"
                    @endif
                >
                    {{link_to('admin/'.$navitem['url'],trans('common.'.$navitem['title']))}}
                </li>
                @endforeach
            </ul>
    </div>
    </div>
</div>