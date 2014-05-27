@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div id="details">
    <div id="maininfo"  itemscope itemtype="http://schema.org/Product">
        {{--*/ $morepic = Image::where("laproduct_id",'=',$oProduct->id)
        ->where('lapic','!=',$oProduct->laimage)
        ->orderBy(DB::Raw('RAND()'))
        ->take(6)
        ->get() /*--}}


        @if(count($morepic)>0)
        <div id="picbox" class="col xs-12 col-sm-5 col-md-5" itemprop="image">
            <img rel="image_src" id="mainpicimg" src="{{URL::to('/uploads/product/'.$oProduct->laimage)}}">
        </div>
            <div  class="col-md-1 morepic hidden-sm hidden-xs">
                <a href="javascript:changepic('{{$oProduct->laimage}}')">
                    <img src="{{URL::to('/uploads/thumbnails/product/'.$oProduct->laimage)}}">
                </a>
                @foreach($morepic as $pic)
                <a href="javascript:changepic('{{$pic->lapic}}')">
                <img src="{{URL::to('/uploads/thumbnails/product/'.$pic->lapic)}}">
                </a>
                @endforeach

        </div>
        @else
        <div id="picbox" class="col-xs-12 col-sm-5 col-md-5"  itemprop="image">
            <img rel="image_src" src="{{URL::to('/uploads/product/'.$oProduct->laimage)}}">
        </div>
        @endif

        @if(count($morepic)>0)
        <div id="productinfo" class="col-xs-12 col-sm-6 col-md-6">
         @else
            <div id="productinfo" class="col-sm-7 col-md-7">
            @endif
            <h3  itemprop="name">{{$oProduct->latitle}}</h3>
            <p >
                <span class="glyphicon glyphicon-usd"></span>
                <span id="detailsPrice" >{{number_format($oProduct->laprice,0,',','.')}}</span>
                @if($oProduct->laprice < $oProduct->laoldprice)
            ( <span class="detailsOldPrice"> {{number_format($oProduct->laoldprice,0,',','.')}} </span> )
            @endif
            @if($oProduct->sumvariant > 0)
                  {{--*/ $variants = Product::getVariants($oProduct->id) /*--}}
            <dl>
                <dt>Chọn mẫu</dt>
                <dd>
                    <ul id="variant" class="list-inline">
                        @foreach($variants as $vari)
                        <li>
                            <a href="javascript:changevariant({{$vari->id}})">
                                <img src="{{URL::to('/uploads/thumbnails/product/'.$vari->laimage)}}" title="{{$vari->lashortinfo}}" class="variantthumb">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </dd>
                    <dt>Mẫu đã chọn:</dt>
                    <dd id="variantselectname">

                    </dd>
            </dl>
            @endif
                <div>
                    {{ Form::open(array(
                        'url' => '/cart/add',
                        'class'=>'form-inline',
                    )) }}
                        {{Form::hidden('laproduct_id',$oProduct->id)}}
                        {{Form::hidden('variantname','',array('id'=>'variantselectnameinput'))}}
                        {{Form::hidden('caturl',$oProduct->cat1url)}}
                        {{Form::hidden('producturl',$oProduct->laurl)}}
                    <div class="form-group">
                        {{Form::text('amount',1,array('class'=>'form-control','id'=>'cartamount') ) }}
                    <button id="addtocart" class="btn btn-default btn-success" {{(($oProduct->sumvariant > 0)?'disabled="disabled"':'')}} ><span class="glyphicon glyphicon-shopping-cart"></span> Mua</button>
                    </div>
                    {{ Form::close() }}

                </div>
                <div class="clearfix"></div>
                <br>
             <dl class="dl-horizontal">
                 @if($oProduct->factorname != '')
                <dt>Xuất xứ</dt>
                <dd  itemprop="manufacturer"><a class="label label-success" href="{{URL::to('hastag/'.$oProduct->factorurl)}}">{{$oProduct->factorname}}</a></dd>
                 @endif
                @if($oProduct->lachucnang != '')
                <dt>Chức năng</dt>
                <dd><a class="label label-warning" href="{{URL::to('hastag/'.$oProduct->lachucnang)}}">{{$oProduct->lachucnang}}</a></dd>
                @endif
                @if($oProduct->lakeyword !='')
                {{--*/ $aKeys = explode(',',$oProduct->lakeyword) /*--}}
                    @if(count($aKeys)>0)
                     <dt>Từ khóa</dt>
                     <dd>
                         @foreach($aKeys as $key)
                         <a class="label label-primary" href="{{URL::to('hastag/'.$key)}}">{{$key}}</a>
                         @endforeach
                     </dd>
                    @endif
                @endif
                @if($oProduct->lakhoiluong != '')
                <dt>Khối lượng (cả vỏ)</dt>
                <dd>{{$oProduct->lakhoiluong}} (gram)</dd>
                @endif
                @if($oProduct->ladungtich != '')
                <dt>Dung lượng</dt>
                <dd>{{$oProduct->ladungtich}}</dd>
                @endif
                @if(trim($oProduct->lashortinfo) != '')
                <dt>Mô tả</dt>
                <dd>{{$oProduct->lashortinfo}}</dd>
                @endif

            </dl>
            @if($oProduct->laprice < $oProduct->laoldprice)
            <p class="detailsOldPriceBlock badge">{{number_format(($oProduct->laoldprice-$oProduct->laprice)/$oProduct->laoldprice*100,0,'.',',')}}%
             </p>
            @endif
                <div class="fb-like" data-href="{{Request::url()}}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div id="comment">

    </div>
        <br>
    <div id="productcontent" class="clearfix">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tabinfo" data-toggle="tab">Thông tin sản phẩm</a></li>
            <li><a href="#tabhdsd" data-toggle="tab">Hướng dẫn sử dụng</a></li>
            <li><a href="#tabcomment" data-toggle="tab">Bình luận</a></li>
            <li><a href="#tabnews" data-toggle="tab">Tin tức liên quan </a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="tabinfo">{{$oProduct->lainfo}}</div>

            <div class="tab-pane" id="tabhdsd">{{$oProduct->lauseguide}}</div>
            <div class="tab-pane text-center" id="tabcomment">
                <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <div class="tab-pane" id="tabnews">
                {{--*/ $productNews = Product::getProductNews($oProduct->id) /*--}}
                @if(count($productNews)>0)
                @foreach($productNews as $news)
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

                @endif
            </div>
        </div>

    </div>
    <div id="ralate"></div>
</div>
@stop
@section('jscript')
    @parent
 <script>
     $(".variantthumb").tooltip();
     $('#myTab a').click(function (e) {
         e.preventDefault()
         $(this).tab('show')
     })
     function changepic(file){
         $("#mainpicimg").attr('src',"{{URL::to('/uploads/product/')}}/"+file);
     }
     function changevariant(id){
         $("#variantselectname").html("");
         $("#variantselectname").removeClass("label label-warning");
         $("#variantselectname").addClass("ajaxload");
         $.ajax({
             url: "{{URL::to('/ajax/getvariant')}}/"+id,
             success:function(msg){
                var response = eval(msg);
                 $("#mainpicimg").attr('src',"{{URL::to('/uploads/product/')}}/"+msg.lapic);
                 $("#variantselect").val(msg.id);
                 $("#variantselectname").html(msg.lashortinfo);
                 $("#variantselectname").removeClass("ajaxload");
                 $("#variantselectname").addClass("label label-warning");
                 $("input[name=laproduct_id]").val(msg.id);
                 $("#variantselectnameinput").val(msg.lashortinfo);
                 $("#addtocart").removeAttr("disabled");
             }
         });
     }
 </script>
@stop