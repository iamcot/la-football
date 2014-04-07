<div class="col-xs-6 col-md-7">
    <dl class="checkoutinfo">
        <dt>Thông tin nhận hàng</dt>
        {{--*/ $oShipping = Config::get('shop.shipping.'.$orderinfo->lashipping) /*--}}
        <dd>Ship hàng: <strong>{{$oShipping['value']}}</strong></dd>
        {{--*/ $oPayment = Config::get('shop.payment.'.$orderinfo->lapayment) /*--}}
        <dd>Thanh toán: <strong>{{$oPayment['value']}}</strong></dd>
        <dd>Người nhận: <strong>{{$orderinfo->laordername}}</strong></dd>
        <dd>SĐT: <strong>{{$orderinfo->laordertel}}</strong></dd>
        @if($orderinfo->laorderemail !='')
        <dd>Email: <strong>{{$orderinfo->laorderemail}}</strong></dd>
        @endif
        <dd>Địa chỉ: <strong>{{$orderinfo->laorderaddr}}</strong></dd>
        {{--*/ $oProvince = Config::get('shop.province.'.$orderinfo->laorderprovince) /*--}}
        <dd>Tỉnh: <strong>{{$oProvince['title']}}</strong></dd>
        @if($orderinfo->laorderdistrict != 0)
        {{--*/ $oDistrict = Config::get('shop.hcm_district.'.$orderinfo->laorderdistrict) /*--}}
        <dd>Quận: <strong>{{$oDistrict['title']}}</strong></dd>
        @endif
        @if($orderinfo->laordernote !='')
        <dd>Ghi chú: <strong>{{$orderinfo->laordernote}}</strong></dd>
        @endif
    </dl>
</div>
<div class="col-xs-6 col-md-5 ">
    <strong>Tổng giá trị đơn hàng</strong>
    <table class="table table-responsive">
        <tr>
            <td>Giá Sản phẩm</td>
            <td class="text-right">{{number_format($orderinfo->sumsanpham,0,',','.')}}</td>
        </tr>
        <tr>
            <td>Phiếu giảm giá
                @if($orderinfo->voucher != '' )
                ( <strong>{{$orderinfo->voucher}}</strong>
                {{--*/ $actVoucher = Config::get('voucher.'.$orderinfo->voucher) /*--}}
                -{{number_format($actVoucher['value'],0,',','.')}}{{(($actVoucher['type']=='percent')?'%':'')}} )
                @endif
            </td>
            <td class="text-right">
                -{{number_format($orderinfo->giamvoucher,0,',','.')}}
            </td>
        </tr>
        <tr>
            <td>*Phí vận chuyển (<strong>{{number_format($orderinfo->lasumkhoiluong,0,',','.')}}</strong> g)<br>
                <em id="shippingtime"></em></td>
            <td class="text-right" id="feeshippingdisplay">{{number_format($orderinfo->lafeeshipping,0,',','.')}}</td>
        </tr>
        <tr>
            <td><strong>Tổng giá trị</strong></td>
            <td class="text-right"><strong
                    id="totalbill">{{number_format(($orderinfo->sumsanpham-$orderinfo->giamvoucher+$orderinfo->lafeeshipping),0,',','.')}}</strong></td>
        </tr>
    </table>
</div>
<table class="table table-responsive carttable table-bordered">
    <thead>
    <tr>
        <th class="text-center">STT</th>
        <th class="hidden-print"></th>
        <th>Tên sản phẩm</th>
        <th class="text-center">Số lượng</th>
        <th class="text-right">Đơn giá</th>
        <th class="text-right">Thành tiền</th>
    </tr>
    </thead>
    {{--*/ $count = 1 /*--}}
    @foreach($orderitems as $cart)
    <tr>
        <td class="text-center">{{$count}}</td>
        <td class="cartimg hidden-print">{{HTML::image('/uploads/thumbnails/product/'.$cart->laimage)}}</td>
        <td><a href="{{URL::to($cart->caturl.'/'.$cart->producturl.'.html')}}" target="_BLANK">{{$cart->latitle}}</a>
            {{$cart->variantname}}
        </td>
        <td class="text-center">{{$cart->amount}} </td>
        <td class="text-right">{{number_format($cart->laprice,0,',','.')}}</td>
        <td class="text-right">{{number_format($cart->amount*$cart->laprice,0,',','.')}}</td>
    </tr>
    {{--*/ $count += 1 /*--}}
    @endforeach

</table>