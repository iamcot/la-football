<div id="header" class="container-fluid wrap">
    <div class="pull-left col-xs-8 col-sm-8">

        <div id="logo" class="pull-left col-xs-12 col-sm-6">
            <a href="{{URL::to('/')}}"></a>
        </div>
        <div id="search" class="pull-right col-sm-6 hidden-xs hidden-sm hidden-print">
            <div>
                <div class="input-group">
                    {{ Form::open(array(
                        'url' => 'search',
                        'method'=>'post',
                    )) }}
                    <input type="text" class="form-control" name="search" placeholder="Tên sản phẩm, từ khóa ...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" style=""></span></button>
                      </span>
                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>
    <a title="Xem giỏ hàng" href="{{URL::to('/cart/')}}" class="bag pull-right col-sm-1 col-xs-4 hidden-print" >
        {{--*/ $sumcart = Orders::getSumCartItem()/*--}}
        @if($sumcart>0)
        <span class="badge">{{$sumcart}}</span>
        @endif
    </a>
    <div id="info" class="pull-right col-xs-12  col-sm-3 text-right hidden-xs nopaddingright hidden-print">
        <span class="small"><span class="glyphicon glyphicon-phone-alt "> </span> Hotline: <strong>098.3717.098</strong></span>
        <div class="cartinfo">
            <span class="cartsum">@if(Session::has('uid'))
            <a href="{{ URL::to('cart/uid/'.Session::get('uid')) }}">Các đơn hàng cũ</a>
            @endif
            </span> <br>
            <span class="cartsum"><a href="javascript:showflybasket()"><strong class="text-success">{{$sumcart}}</strong> sản phẩm | <span class="glyphicon glyphicon-usd"></span> <strong  class="text-success">{{number_format(Orders::getSumPriceCart(),0,',','.')}}</strong></a></span>
        </div>
        @if(Session::has('cart'))
        <div id="basketflybox">
            <span class="flybutton glyphicon glyphicon-eject" style="right:10px"></span>
            <table class="table flybasketcontent">
                {{--*/ $sumprice = 0 /*--}}

                @foreach(Session::get('cart') as $item)
                <tr><td class="col-xs-8 text-left"><strong>{{$item['latitle']}}</strong> {{$item['variantname']}} x {{$item['amount']}}</td><td class="text-right"><span class="glyphicon glyphicon-usd"></span> {{number_format($item['amount'] * $item['laprice'],0,',','.')}}</td></tr>
                {{--*/ $sumprice += ($item['amount'] * $item['laprice']) /*--}}
                @endforeach

                <tr><td colspan="2" class="text-right"><a href="{{URL::to('/cart/')}}">Thanh toán <span class="glyphicon glyphicon-play"></span></a></td></tr>
            </table>
        </div>
        @endif

    </div>
</div>
@section('jscript')
<script>
    @if(Session::get('actionstatus', 0) == Config::get('actionstatus.cart_has_new'))

        $(document).ready(function() {
            $("#basketflybox").show();
        });

    @endif


         function showflybasket(){
             $("#basketflybox").show();
         }
         function hideflybasket(){
             $("#basketflybox").hide();
         }
         $('html').click(function() {
             $("#basketflybox").hide();
         });

         $('#basketflybox').click(function(event){
             event.stopPropagation();
         });
     </script>
@stop