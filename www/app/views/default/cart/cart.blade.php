@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div id="cartpage" class="container-fluid">
    @if(Session::has('cart'))
    <div class="col-xs-12">
        {{--*/ $actionstatus = Session::get('actionstatus', 0) /*--}}
        @if($actionstatus >= 20 && $actionstatus <= 29)
        <div class="bg-danger row-fluid">{{trans('error.'.$actionstatus)}}</div>
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
                <td class="text-center"><a title="Tăng 1 sản phẩm" class="badge cartamountup" href="{{URL::to('cart/changeamout/'.$cart['id'].'/1')}}">+</a> {{$cart['amount']}} <a title="Giảm 1 sản phẩm"  href="{{URL::to('cart/changeamout/'.$cart['id'].'/0')}}" class="badge cartamountdown">-</a></td>
                <td class="text-right">{{number_format($cart['laprice'],0,',','.')}}</td>
                <td class="text-right">{{number_format($cart['amount']*$cart['laprice'],0,',','.')}}</td>
            </tr>
            {{--*/ $count += 1 /*--}}
            {{--*/ $sumkhoiluong += ($cart['amount']*$cart['lakhoiluong']) /*--}}
            {{--*/ $sum += ($cart['amount']*$cart['laprice']) /*--}}
            @endforeach
            <tr>

                <td class="text-right" colspan="2"></td>
                <td style="width: 25%">
                    <div class="input-group">
                        <span class="input-group-addon">Tổng Klg (g)</span>
                        <input type="text" class="form-control" placeholder="Tổng khối lượng hàng"
                               name="showsumklg" value="{{$sumkhoiluong}}" onchange="checkProvinceFee()">

                    </div>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="col-xs-12 col-md-7 cart-customer-info">
        {{Form::open(array(
        'url' => 'cart/saveorderinfo'
        ))}}
        {{Form::hidden('sumkhoiluong',$sumkhoiluong)}}
        {{Form::hidden('feeshipping','50000')}}
        <h3>Hình thức thanh toán và nhận hàng</h3>

        <div class="input-group">
            <select class="form-control" placeholder="Hình thức Nhận hàng" name="shipping"
                    onchange="checkShipping(this.value)">
                <option value="0">Hình thức nhận hàng</option>
                @foreach(Config::get('shop.shipping') as $payment)
                <option value="{{$payment['id']}}">{{$payment['value']}}</option>
                @endforeach
            </select>
            <span class="input-group-addon">Nhận hàng</span>
        </div>
        <br>

        <div class="input-group">
            <select class="form-control" placeholder="Hình thức Thanh toán" name="payment" onchange="checkProvinceFee()">
                <option value="0">Hình thức thanh toán</option>
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
            <select class="form-control" placeholder="Tỉnh Thành phố" name="orderprovince"
                    onchange="checkProvinceFee()">
                <option value="0">Tỉnh/Thành Phố</option>
                {{--*/ $arrProvince = array_values(array_sort(Config::get('shop.province'), function($value) { return
                $value['id']; })) /*--}}
                @foreach($arrProvince as $province)
                <option value="{{$province['id']}}">{{$province['title']}}</option>
                @endforeach
            </select>
            <span class="input-group-addon">Tỉnh thành</span>
        </div>
        <br>

        <div class="input-group">
            <select class="form-control" placeholder="Quận Huyện trong TP Hồ Chí Minh" name="orderdistrict" onchange="checkProvinceFee()">
                <option value="0">Quận/Huyện trong TP Hồ Chí Minh</option>
                @foreach(Config::get('shop.hcm_district') as $province)
                <option value="{{$province['id']}}">{{$province['title']}}</option>
                @endforeach
            </select>
            <span class="input-group-addon">Quận/Huyện </span>
        </div>
        <br>

        <button class="btn btn-info"><span class="glyphicon glyphicon-floppy-save"></span> Lưu thông tin</button>
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
                        ( <strong>{{$voucher['id']}}</strong>
                        -{{number_format($voucher['value'],0,',','.')}}{{(($voucher['type']=='percent')?'%':'')}} )
                        <a href="{{URL::to('cart/delvoucher')}}" title="Xóa voucher này"><span class="glyphicon glyphicon-remove-sign"></span></a>
                        @endif
                    </td>
                    <td class="text-right">
                        {{--*/ $giamvoucher = 0 /*--}}
                        @if($voucher != null )
                        @if($voucher['type']=='percent')
                        {{--*/ $giamvoucher = $voucher['value']*$sum/100 /*--}}
                        @else
                        {{--*/ $giamvoucher = $voucher['value'] /*--}}
                        @endif
                        -{{number_format($giamvoucher,0,',','.')}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>*Phí vận chuyển (<strong>{{number_format($sumkhoiluong,0,',','.')}}</strong> gram)<br>
                    <em id="shippingtime"></em></td>
                    <td class="text-right" id="feeshippingdisplay"></td>
                </tr>
                <tr>
                    <td><strong>Tổng giá trị</strong></td>
                    <td class="text-right"><strong
                            id="totalbill">{{number_format(($sum-$giamvoucher),0,',','.')}}</strong></td>
                </tr>
            </table>
            <button class="btn btn-success pull-right"><span class="glyphicon glyphicon-shopping-cart"></span> Gửi đơn
                hàng
            </button>
            <div class="clearfix"></div>
            <br>
        </div>
        <em>(*) Phí vận chuyển tính tương đối trên bảng giá của bưu điện và các nhà cung cấp dịch vụ ship hàng. Có thể chênh lệch thực tế 1 ít. Mong các bạn thông cảm.</em>
    </div>
    @else
    <p>Chưa có sản phẩm nào trong giỏ hàng</p>
    @endif
</div>
@stop
@section('jscript')
<script>
    function checkShipping(select) {
        $("select[name=payment]").html('');
        $("select[name=orderprovince]").html('');
        if (select != 0) {
            $.ajax({
                url: "{{URL::to('cart/checkshipping')}}/" + select,
                type: "get",
                success: function (msg) {
                    var result = eval(msg);
                    $.each(result['payment'], function (index, pay) {
                        $("select[name=payment]").append("<option value='" + pay['id'] + "'>" + pay['value'] + "</option>");
                    });
//                        console.log();
                    if (result['province'].length > 0) {
                        if (result['province'].length > 1)
                            $("select[name=orderprovince]").html('<option value="0">Tỉnh/Thành Phố</option>');
                        $.each(result['province'], function (index, prov) {
                            $("select[name=orderprovince]").append("<option value='" + prov['id'] + "'>" + prov['title'] + "</option>");
                        });
                        $("select[name=orderdistrict]").val(0);
                        checkProvinceFee();
                    }
//                        if(result['enabledistrict']== 1) $("select[name=orderdistrict]").removeAttr("disabled");
//                        else  $("select[name=orderdistrict]").attr("disabled","disabled");
                }
            })
        }
    }
    function checkProvinceFee() {
        var province = $("select[name=orderprovince]").val();
        var klg = $("input[name=showsumklg]").val();
        var payment = $("select[name=payment]").val();
        var shipping = $("select[name=shipping]").val();
        var district = $("select[name=orderdistrict]").val();
        var currentbill = "{{$sum-$giamvoucher}}";
        $("#feeshippingdisplay").html("");
        $("#shippingtime").html("");
        $("#totalbill").html("");
        $("input[name=feeshipping]").val("");
        if(payment == 0 || shipping == 0){
            alert("Vui lòng chọn phương thức thanh toán và nhận hàng");
            return;
        }
        if (province != 0) {
            if(shipping == 'ship_hcm' && district == 0){
                return;
            }
            $("#feeshippingdisplay").addClass("ajaxload");


                $.ajax({
                    url: "{{URL::to('cart/checkfee')}}",
                    type: "get",
                    data: "province="+ province + "&klg=" + klg + "&shipping=" + shipping + "&payment=" + payment +"&district="+district+ "&token={{Session::get('_token')}}",
                    success: function (msg) {
                        var result = eval(msg);
                        if (result['status'] == 1) {
                            $("input[name=feeshipping]").val(result['feeshipping']);
                            $("#feeshippingdisplay").removeClass("ajaxload");
                            $("#feeshippingdisplay").html(result['feeshipping'].formatMoney(0, ',', '.'));
                            $("#shippingtime").html("Thời gian nhận hàng "+result['time']+" ngày");
                            $("#totalbill").html((parseInt(result['feeshipping']) + parseInt(currentbill)).formatMoney(0, ',', '.'));
                        }
                    }
                });
        }
    }
    Number.prototype.formatMoney = function (c, d, t) {
        var n = this,
            c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
            j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };

</script>
@stop