@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div id="cartpage" class="container-fluid">
    @if(Session::has('cart'))
    <div class="col-xs-12">
        {{--*/ $actionstatus = Session::get('actionstatus', 0) /*--}}
        @if($actionstatus == Config::get('actionstatus.voucher_not_input'))
         <div class="bg-danger row-fluid">Bạn chưa nhập voucher</div>
        @elseif($actionstatus == Config::get('actionstatus.voucher_not_avail'))
        <div class="bg-danger  row-fluid">Mã Voucher không tồn tại</div>
        @elseif($actionstatus == Config::get('actionstatus.voucher_expried'))
        <div class="bg-danger  row-fluid">Voucher này đã hết hạn sử dụng</div>
        @endif
        <h2>Thanh toán đơn hàng</h2>
        <table class="table-responsive table carttable">
            <thead>
            <tr>
                <th class="text-center">STT</th>
                <th></th>
                <th>Tên sản phẩm</th>
                <th class="text-center">Số lượng</th>
                <th class="text-right">Đơn giá</th>
                <th class="text-right">Thành tiền</th>
            </tr>
            </thead>
            {{--*/ $count = 1 /*--}}
            {{--*/ $sum = 0 /*--}}
            {{--*/ $sumkhoiluong = 0 /*--}}
            @foreach(Session::get('cart') as $cart)
            <tr>
                <td class="text-center">{{$count}}</td>
                <td class="cartimg">{{HTML::image('/uploads/thumbnails/product/'.$cart['laimage'])}}</td>
                <td><a href="{{URL::to($cart['caturl'].'/'.$cart['producturl'].'.html')}}" target="_BLANK">{{$cart['latitle'].'</a>
                    '.$cart['variantname']}}
                </td>
                <td class="text-center">{{$cart['amount']}}</td>
                <td class="text-right">{{number_format($cart['laprice'],0,',','.')}}</td>
                <td class="text-right">{{number_format($cart['amount']*$cart['laprice'],0,',','.')}}</td>
            </tr>
            {{--*/ $count += 1 /*--}}
            {{--*/ $sumkhoiluong += ($cart['amount']*$cart['lakhoiluong']) /*--}}
            {{--*/ $sum += ($cart['amount']*$cart['laprice']) /*--}}
            @endforeach
        </table>
    </div>
    <div class="col-xs-12 col-md-7 cart-customer-info">
        {{Form::open(array(
            'url' => 'cart/saveorderinfo'
        ))}}
        <h3>Hình thức thanh toán và nhận hàng</h3>

        <div class="input-group">
            <select class="form-control" placeholder="Hình thức Nhận hàng" name="shipping">
                @foreach(Config::get('shop.shipping') as $payment)
                <option value="{{$payment['id']}}">{{$payment['value']}}</option>
                @endforeach
            </select>
            <span class="input-group-addon">Nhận hàng</span>
        </div>
        <br>

        <div class="input-group">
            <select class="form-control" placeholder="Hình thức Thanh toán" name="payment">
                @foreach(Config::get('shop.payment') as $payment)
                 <option value="{{$payment['id']}}">{{$payment['value']}}</option>
                @endforeach
            </select>
            <span class="input-group-addon">Thanh toán</span>
        </div>
        <br>
        <h3>Thông tin ship hàng</h3>

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Họ tên người nhân" name="ordername">
            <span class="input-group-addon">Họ Tên</span>
        </div>
        <br>

        <div class="input-group">
            <input type="tel" class="form-control" placeholder="Số điện thoại người nhận" name="ordertel">
            <span class="input-group-addon">Điện thoại</span>
        </div>
        <br>

        <div class="input-group">
            <input type="email" class="form-control" placeholder="Địa chỉ Email" name="orderemail">
            <span class="input-group-addon">Email</span>
        </div>
        <br>

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Địa chỉ nhân hàng" name="orderaddr">
            <span class="input-group-addon">Địa chỉ</span>
        </div>
        <br>
        <div class="input-group">
            <select class="form-control" placeholder="Tỉnh Thành phố"   name="orderprovince">
                @foreach(Config::get('shop.province') as $province)
                <option value="{{$province['id']}}">{{$province['title']}}</option>
                @endforeach
            </select>
            <span class="input-group-addon">Tỉnh thành</span>
        </div>
        <br>
        <div class="input-group">
            <select class="form-control" placeholder="Quận Huyện trong TP Hồ Chí Minh"  name="orderdistrict">
                <option value="ship-shop">Q1</option>
            </select>
            <span class="input-group-addon">Quận Huyện</span>
        </div>
        <br>

        <button  class="btn btn-info"><span class="glyphicon glyphicon-floppy-save"></span> Lưu thông tin</button>
        {{Form::close()}}
    </div>
    <div class="col-xs-12 col-md-5">
        <h3>Phiếu giảm giá</h3>
        {{ Form::open(array(
            'url'=>'cart/addvoucher'
        ))}}

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Mã Phiếu Giảm Giá" name="vouchercode">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Thêm Phiếu Giảm Giá</button>
          {{Form::close()}}
      </span>
        </div>
        <br>
        <div class="bg-warning container-fluid">
        <h3>Tổng giá trị đơn hàng</h3>
        <table class="table table-responsive">
            <tr>
                <td>Giá Sản phẩm</td>
                <td class="text-right">{{number_format($sum,0,',','.')}}</td>
            </tr>
            <tr>
                <td>Phiếu giảm giá
                    {{--*/ $voucher = Session::get('voucher',null) /*--}}
                    @if($voucher != null )
                    ( <strong>{{$voucher['id']}}</strong> -{{number_format($voucher['value'],0,',','.')}}{{(($voucher['type']=='percent')?'%':'')}} )
                    @endif
                </td>
                <td class="text-right">
                    {{--*/ $giamvoucher = 0 /*--}}
                    @if($voucher != null )
                        @if($voucher['type']=='percent')
                    {{--*/ $giamvoucher = $voucher['value']*$sum/100  /*--}}
                        @else
                        {{--*/ $giamvoucher = $voucher['value'] /*--}}
                        @endif
                    -{{number_format($giamvoucher,0,',','.')}}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Phí vận chuyển (<strong>{{number_format($sumkhoiluong,0,',','.')}}</strong> gram)</td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td><strong>Tổng giá trị</strong></td>
                <td class="text-right"><strong>{{number_format(($sum-$giamvoucher),0,',','.')}}</strong></td>
            </tr>
        </table>
            <button class="btn btn-success pull-right"><span class="glyphicon glyphicon-shopping-cart" ></span> Gửi đơn hàng</button>
            <div class="clearfix"></div>
            <br>
        </div>
    </div>
    @else
    <p>Chưa có sản phẩm nào trong giỏ hàng</p>
    @endif
</div>
@stop