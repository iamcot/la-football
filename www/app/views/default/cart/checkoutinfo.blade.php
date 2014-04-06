@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div id="cartpage" class="container-fluid">

    <div class="col-xs-12">
        <div class="bg-success"><strong>Đơn hàng đã được gửi đi, chúng tôi sẽ liên hệ giao hàng cho quý khách trong thời gian sớm nhất.</strong></div>
        <h3>Mã Đơn hàng: <strong class="text-success">{{$orderinfo->id}}</strong></h3>
        <table class="table-responsive table carttable">
            <thead>
            <tr>
                <th class="text-center">STT</th>
                <th></th>
                <th>Tên sản phẩm</th>
                <th class="text-center">Số lượnng</th>
                <th class="text-right">Đơn giá</th>
                <th class="text-right">Thành tiền</th>
            </tr>
            </thead>
            {{--*/ $count = 1 /*--}}
            {{--*/ $sum = 0 /*--}}
            {{--*/ $sumkhoiluong = 0 /*--}}
            @foreach($orderitems as $cart)
            <tr>
                <td class="text-center">{{$count}}</td>
                <td class="cartimg">{{HTML::image('/uploads/thumbnails/product/'.$cart->laimage)}}</td>
                <td><a href="{{URL::to($cart->caturl.'/'.$cart->producturl.'.html')}}" target="_BLANK">{{$cart->latitle}}</a>
                    {{$cart->variantname}}
                </td>
                <td class="text-center">{{$cart->amount}} </td>
                <td class="text-right">{{number_format($cart->laprice,0,',','.')}}</td>
                <td class="text-right">{{number_format($cart->amount*$cart->laprice,0,',','.')}}</td>
            </tr>
            {{--*/ $count += 1 /*--}}
            {{--*/ $sumkhoiluong += ($cart->amount*$cart->lakhoiluong) /*--}}
            {{--*/ $sum += ($cart->amount*$cart->laprice) /*--}}
            @endforeach

        </table>
        <div class="col-xs-12 col-md-6 ">
        <h4>Thông tin nhận hàng</h4>
        <dl>
            <dt>Cách thức ship hàng</dt>
            <dd>{{$orderinfo->lashipping}}</dd>
            <dt>Cách thức thanh toasn</dt>
            <dd>{{$orderinfo->lapayment}}</dd>
            <dt>Tên người nhận</dt>
            <dd>{{$orderinfo->laordername}}</dd>
            <dt>SĐT người nhận</dt>
            <dd>{{$orderinfo->laordertel}}</dd>
            @if($orderinfo->laorderemail !='')
            <dt>Email</dt>
            <dd>{{$orderinfo->laorderemail}}</dd>
            @endif
            <dt>Địa chỉ nhận hàng</dt>
            <dd>{{$orderinfo->laorderaddr}}</dd>
            <dt>Tỉnh/Thành Phố</dt>
            <dd>{{$orderinfo->laorderprovince}}</dd>
            @if($orderinfo->laorderdistrict > 0)
            <dt>Quận Huyện</dt>
            <dd>{{$orderinfo->laorderdistrict}}</dd>
            @endif
        </dl>
        </div>
        <div class="col-xs-12 col-md-6 ">
            <h3>Tổng giá trị đơn hàng</h3>
            <table class="table table-responsive">
                <tr>
                    <td>Giá Sản phẩm</td>
                    <td class="text-right">{{number_format($sum,0,',','.')}}</td>
                </tr>
                <tr>
                    <td>Phiếu giảm giá
                        @if($orderinfo->voucher != '' )
                        ( <strong>{{$orderinfo->voucher}}</strong>
                        {{--*/ $aVoucher = Config::get('voucher') /*--}}
                        {{--*/ $actVoucher = $aVoucher[$orderinfo->voucher] /*--}}
                        -{{number_format($actVoucher['value'],0,',','.')}}{{(($actVoucher['type']=='percent')?'%':'')}} )
                        <a href="{{URL::to('cart/delvoucher')}}" title="Xóa voucher này"><span class="glyphicon glyphicon-remove-sign"></span></a>
                        @endif
                    </td>
                    <td class="text-right">
                        {{--*/ $giamvoucher = 0 /*--}}
                        @if($actVoucher != null )
                        @if($actVoucher['type']=='percent')
                        {{--*/ $giamvoucher = $actVoucher['value']*$sum/100 /*--}}
                        @else
                        {{--*/ $giamvoucher = $actVoucher['value'] /*--}}
                        @endif
                        -{{number_format($giamvoucher,0,',','.')}}
                        @endif
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
                            id="totalbill">{{number_format(($sum-$giamvoucher+$orderinfo->lafeeshipping),0,',','.')}}</strong></td>
                </tr>
            </table>
        </div>

    </div>
</div>
@stop

