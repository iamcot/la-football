<div class="col-sm-6 col-md-4 " itemprop="itemListElement" itemscope itemtype="http://schema.org/Product">
    <div class="thumbnail product">
        <a itemprop="url" href="{{URL::to($list->cat1url.'/'.$list->laurl.'.html')}}">
            <img itemprop="image" src="{{URL::to('/uploads/thumbnails/product/'.$list->laimage)}}"
                 alt="{{$list->latitle}}" title="{{$list->lashortinfo}}">
            <p>
                <strong itemprop="name">{{$list->latitle}}</strong>
            </p>
        </a>
        @if($list->laprice>0)
            <p class="price">
                <span class="glyphicon glyphicon-usd"></span>
                {{number_format($list->laprice,0,',','.')}}
            </p>
            @if($list->laprice < $list->laoldprice)
            <div class="oldPrice"></div>
            @endif
            @if($list->ladatenew > time())
            <div class="newgif"></div>
            @endif
        @endif
    </div>
</div>