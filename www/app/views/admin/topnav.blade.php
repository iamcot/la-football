<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <ul class="nav">
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