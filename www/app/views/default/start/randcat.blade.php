{{--*/ $randCats = Vcategory::randCat() /*--}}
{{--*/     $toggle = 0; /*--}}

<div>
    @foreach($randCats as $cat)
        <div class="randcat {{(($toggle%2==0)?'':'bgpink')}}">
            <div class="col-xs-5 {{(($toggle%2==0)?'pull-left':'pull-right')}} ">
                {{HTML::image("/uploads/cat/".$cat['cat']->id.'/'.$cat['cat']->laimage,'',array('class'=>'img-rounded')) }}
            </div>
            <div class="col-xs-7 {{(($toggle%2==0)?'pull-left':'pull-right')}} ">
            <h2>{{link_to('/list/'.$cat['cat']->laurl,$cat['cat']->latitle)}}</h2>
                <p>{{$cat['cat']->lainfo}}</p>
                @foreach($cat['product'] as $product)
                    <div class="col-xs-4 randproduct">
                        {{HTML::image("/uploads/thumbnails/product/".$product->laimage,'',array('class'=>'img-circle')) }}
                        <p>{{link_to($product->laurl,$product->latitle)}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    <div class="clearfix"></div>
    {{--*/     $toggle += 1; /*--}}
    @endforeach
</div>
