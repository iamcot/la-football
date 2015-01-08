@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div class="container-fluid lists" itemscope itemtype="http://schema.org/ItemList">
    @if(count($lists)>0)
        @foreach($lists as $news)
        <div class="media">
            @if($news->laimage != '')
            <a class="pull-left" href="{{URL::to('/tin-tuc/'.$news->laurl)}}.html">
                <img class="media-object" src="{{URL::to('/uploads/thumbnails/product/'.$news->laimage)}}" alt="{{$news->latitle}}">
            </a>
            @endif
            <div class="media-body">

                <h2 class="media-heading"><a href="{{URL::to('/tin-tuc/'.$news->laurl)}}.html">{{$news->latitle}} </a></h2>

                {{$news->lashortinfo}}
            </div>
        </div>
        @endforeach
        <p class="clearfix"></p>
    @endif

    <div class="text-center clearfix">
        {{$lists->links()}}
    </div>
</div>
@stop