{{--*/ $randCats = Vcategory::randCat() /*--}}
{{--*/     $toggle = 0; /*--}}

<div>
    @foreach($randCats as $cat)
        <div class="randcat {{(($toggle%2==0)?'':'bgpink marginoverleft')}}">
            <div class="col-xs-12 col-md-5 {{(($toggle%2==0)?'pull-left':'pull-right')}} ">
                {{HTML::image("/uploads/cat/".$cat['cat']->id.'/'.$cat['cat']->laimage,'',array('class'=>'img-rounded')) }}
            </div>
            <div class="col-xs-12 col-md-7 {{(($toggle%2==0)?'pull-left':'pull-right')}} ">
            <h1>{{link_to('/'.$cat['cat']->laurl,$cat['cat']->latitle)}}</h1>
                <p>{{$cat['cat']->lainfo}}</p>
                @foreach($cat['product'] as $product)
                    <div class="col-xs-4 randproduct">
                        <a href="{{URL::to('/'.$product->cat1url.'/'.$product->laurl.'.html')}}">
                        {{HTML::image("/uploads/thumbnails/product/".$product->laimage,'',array('class'=>'img-circle','title'=>$product->latitle)) }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    <div class="clearfix"></div>
    {{--*/     $toggle += 1; /*--}}
    @endforeach
</div>
