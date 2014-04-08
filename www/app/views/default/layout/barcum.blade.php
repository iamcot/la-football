<ol class="breadcrumb ">
    @if(isset($typeEnd) && $typeEnd == 'shop')
        <li>Chào mừng đến với thế giới làm đẹp - Thái Boutique - webmypham.net</li>
    @elseif(isset($typeEnd) && $typeEnd == 'list')
        {{--*/ $breadcrumcat = Vcategory::makeBreadcrumCat($categories,$caturl) /*--}}
        <li><a href="{{URL::to('/')}}"><span class="glyphicon glyphicon-home"></span></a></li>
        {{--*/ $breadcrumlv = count($breadcrumcat) /*--}}
        @for($i=0;$i< $breadcrumlv;$i++)
        {{--*/ $cat = $breadcrumcat[$i] /*--}}
            <li>
                @if($i< $breadcrumlv - 1)
                <a href="{{URL::to('/'.$cat['laurl'])}}">
                    {{$cat['latitle']}}
                </a>
                    @else
                    {{$cat['latitle']}}
                @endif

            </li>
        @endfor
        @if(isset($issearch))
            <li>{{trans('common.'.$caturl)}}</li>
        @endif
    @elseif(isset($typeEnd) && $typeEnd == 'details')
        @if($oProduct !=null)
        <li><a href="{{URL::to('/')}}"><span class="glyphicon glyphicon-home"></span></a></li>
            @if($oProduct->cat3id>0 && $oProduct->cat3url!='')
                <li><a href="{{URL::to('/'.$oProduct->cat3url)}}">{{$oProduct->cat3name}}</a></li>
            @endif
            @if($oProduct->cat2id>0 && $oProduct->cat2url!='')
                <li><a href="{{URL::to('/'.$oProduct->cat2url)}}">{{$oProduct->cat2name}}</a></li>
            @endif
            @if($oProduct->cat1id>0 && $oProduct->cat1url!='')
                <li><a href="{{URL::to('/'.$oProduct->cat1url)}}">{{$oProduct->cat1name}}</a></li>
            @endif
            <li>{{$oProduct->latitle}}</li>
        @endif
    @endif
</ol>