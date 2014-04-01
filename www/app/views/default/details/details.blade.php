@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div id="details">
    <div id="maininfo">
        <div id="picbox" class="col-sm-6 col-md-6">
            <img src="{{URL::to('/uploads/product/'.$oProduct->laimage)}}">
        </div>
        <div id="productinfo" class="col-sm-6 col-md-6">
            <h3>{{$oProduct->latitle}}</h3>
            <p id="facots">
                {{$oProduct->factorname}}
            </p>
            <p id="shortinfo">
                {{$oProduct->lashortinfo}}
            </p>
            <p id="detailsPrice">
                <span class="glyphicon glyphicon-usd"></span>
                {{number_format($oProduct->laprice,0,'.',',')}}
            </p>

            @if($oProduct->laprice < $oProduct->laoldprice)
            <p class="detailsOldPriceBlock">Tiết kiệm được {{number_format(($oProduct->laoldprice-$oProduct->laprice)/$oProduct->laoldprice*100,0,'.',',')}} %
             ( <span class="detailsOldPrice"> {{number_format($oProduct->laoldprice,0,'.',',')}} </span>) </p>
            @endif
        </div>
    </div>

    <div id="comment" class="clearfix"></div>
    <div id="productcontent" class="clearfix">
        {{$oProduct->lainfo}}
    </div>
    <div id="ralate"></div>
</div>
@stop