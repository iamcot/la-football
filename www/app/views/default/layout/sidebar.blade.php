<div id="sidebar" class="{{$sidebartype}}">

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