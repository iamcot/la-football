<div id="sidebar" class="{{$sidebartype}} col-xs-12 col-sm-4 col-md-3">

    {{--*/ $cattree = Vcategory::shopCatTree(0,$categories) /*--}}
    {{$cattree}}
    <div class="clearfix"></div>
    {{--*/ $sidebarads = Myconfig::buildSidebarads() /*--}}
    @foreach($sidebarads as $ads)
        <div class="sidebarBox">
            <a href="{{URL::to($ads['link'])}}">
                {{ HTML::image('/uploads/thumbnails/product/'.$ads['pic'],$ads['title']) }}
            </a>
        </div>
    @endforeach
</div>