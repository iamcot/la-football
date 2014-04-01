<div class="col-sm-6 col-md-4 ">
    <div class="thumbnail product">
        <a href="{{URL::to($list->cat1url.'/'.$list->laurl.'.html')}}">
            <img src="{{URL::to('/uploads/thumbnails/product/'.$list->laimage)}}"
                 alt="{{$list->latitle}}" title="{{$list->lashortinfo}}">
            <p>
                <strong>{{$list->latitle}}</strong>
            </p>
        </a>
        <p class="price">
            <span class="glyphicon glyphicon-usd"></span>
            {{number_format($list->laprice,0,'.',',')}}
        </p>
        @if($list->laprice < $list->laoldprice)
        <div class="oldPrice"></div>
        @endif
        @if($list->ladatenew > time())
        <div class="newgif"></div>
        @endif
    </div>
</div>