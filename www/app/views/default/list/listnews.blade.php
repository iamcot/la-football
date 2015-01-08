@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div class="container-fluid lists" itemscope itemtype="http://schema.org/ItemList">
    @if(count($lists)>0)
        @foreach($lists as $news)
        <div class="media newsitem">
            @if($news->laimage != '')
            <a class="pull-left" href="{{URL::to('/tin-tuc/'.$news->laurl)}}.html">
                <img class="media-object" src="{{URL::to('/uploads/thumbnails/product/'.$news->laimage)}}" alt="{{$news->latitle}}">
            </a>
            @endif
            <div class="media-body">

                <h3 class="media-heading"><a href="{{URL::to('/tin-tuc/'.$news->laurl)}}.html">{{$news->latitle}} </a></h3>
                <p class="shorinfo">{{$news->lashortinfo}}</p>
                <p class="small pull-right">{{ date("H:i d/m/Y",strtotime($news->created_at)) }}</p>
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