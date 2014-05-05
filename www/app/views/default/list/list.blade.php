@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div class="container-fluid lists" itemscope itemtype="http://schema.org/ItemList">
    @if(!$rootcat && $caturl !='tin-tuc' && !isset($issearch))
    <div class="text-right container-fluid">
        {{ Form::open() }}
             <button name="giatang" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-sort-by-attributes"></span> Giá</button>
             <button name="giagiam" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Giá</button>
             <button name="tentang" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Tên</button>
             <button name="tengiam" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-sort-by-alphabet-alt"></span> Tên</button>
        <p></p>
        {{ Form::close() }}
    </div>
    @elseif ($caturl =='tin-tuc')
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
    @else
        @if(isset($oActCat) && $oActCat != null && $oActCat->lainfo!='')
            <blockquote>{{$oActCat->lainfo}}</blockquote>
         @endif
    @endif

    @if(isset($catchildren) && $catchildren != null)
    <div class="row-fluid parentcat">
        @foreach($catchildren as $children)
            <a class="col-xs-6 col-sm-6 col-md-4" href="{{URL::to($children->laurl)}}">
                @if($children->laimage!='')
                <img class="media-object" src="{{URL::to('/uploads/cat/'.$children->id.'/'.$children->laimage)}}" alt="{{$children->latitle}} - {{$children->lainfo}}">
                @else
                <img style="border: 1px solid #ddd" src="{{URL::to('/src/img/no_photo.jpg')}}">
                @endif
                <h4>{{$children->latitle}}</h4>
            </a>


        @endforeach
        </div>
    <div class="clearfix"></div>
    <br>
    @endif
    @if($caturl !='tin-tuc')
        @if( isset($lists) && $lists != null && count($lists)>0 )
        <div class="row-fluid ">
            @foreach($lists as $list)
                @include(Config::get('shop.theme').'/list/listitem')
            @endforeach
        </div>
        <div class="text-center clearfix">
            @if(!$rootcat)
            {{$lists->links()}}
            @endif
        </div>
        @elseif(!$rootcat)
        <div class="noproduct text-center"></div>
        @endif
    @endif
</div>
@stop