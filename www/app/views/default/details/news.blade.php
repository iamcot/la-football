@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div id="details" class="text-justify">
    <h1>{{$oProduct->latitle}}</h1>
    @if($oProduct->lashortinfo !='')
    <blockquote>
        <p>{{$oProduct->lashortinfo}}</p>
    </blockquote>
    @endif
    <div id="newsimage">
        @if($oProduct->laimage !='')
              {{HTML::image('/uploads/product/'.$oProduct->laimage,$oProduct->latitle)}}
        @endif
    </div>
    <p></p>
    <div id="newscontent" class="text-justify">
        {{$oProduct->lainfo}}
    </div>
    <div class="author text-right">
        <em>Cập nhật lần cuối: {{date('d/m/Y H:i',strtotime($oProduct->updated_at))}} </em>
    </div>
</div>
@stop