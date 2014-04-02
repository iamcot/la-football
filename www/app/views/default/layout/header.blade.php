<div id="header" class="container-fluid wrap">
    <div class="pull-left col-xs-8 col-sm-7">

        <div id="logo" class="pull-left col-xs-12 col-sm-5">
            Thái boutique
        </div>
        <div id="search" class="pull-right col-sm-7 hidden-xs">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Tên sản phẩm, mã đơn hàng...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" style=""></span></button>
                      </span>
                </div>
                <!-- /input-group -->
                <a href="{{URL::to('/cart/clear')}}">Xóa giỏ hàng </a>
            </div>
        </div>

    </div>
    <div class="bag pull-right col-sm-1 col-xs-4" >
        {{--*/ $sumcart = Orders::getSumCartItem()/*--}}
        @if($sumcart>0)
        <span class="badge">{{$sumcart}}</span>
        @endif
    </div>
    <div id="info" class="pull-right col-xs-12  col-sm-4 text-right hidden-xs nopaddingright">
        <span class="small"><span class="glyphicon glyphicon-phone-alt "> </span> Hotline: <strong>098.3717.098</strong></span>
        <div class="cartinfo">
            <span class="cartsum"><a href="javascript:showflybasket()">Đơn hàng hiện tại</a></span> <br>
            <span class="cartsum"><strong class="text-success">{{$sumcart}}</strong> sản phẩm | <span class="glyphicon glyphicon-usd"></span> <strong  class="text-success">{{number_format(Orders::getSumPriceCart(),0,',','.')}}</strong></span>
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

                <tr><td colspan="2" class="text-right"><a>Thanh toán <span class="glyphicon glyphicon-play"></span></a></td></tr>
            </table>
        </div>
        @endif

    </div>

</div>
@section('jscript')
<script>
    @if(Session::get('hasnew', 0) == '1')

        $(document).ready(function() {
            $("#basketflybox").show();
        });

    @endif
    {{--*/ Session::put('hasnew', 0) /*--}}

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