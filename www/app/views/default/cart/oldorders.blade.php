@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div class="col-xs-12">
    <h1>{{$title}}</h1>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr class="">
            <th>Mã đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Tổng giá trị</th>
            <th>Khách hàng</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Giao hàng</th>
            <th>Mã Bưu phẩm</th>
            <th>Thanh toán</th>
            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>Cập nhật lúc</th>
        </tr>
        </thead>

        @foreach($oOrders as $order)
        <tr id="tr{{$order->id}}">
            {{--*/ $details = 'Sản phẩm: '.number_format($order->sumsanpham,0,',','.').'
            <br>Voucher: -'.number_format($order->giamvoucher,0,',','.').'
            <br>Phí ship: '.number_format($order->lafeeshipping,0,',','.') /*--}}
            {{--*/ $oShipping = Config::get('shop.shipping.'.$order->lashipping) /*--}}
            {{--*/ $oPayment = Config::get('shop.payment.'.$order->lapayment) /*--}}
            {{--*/ $oProvince = Config::get('shop.province.'.$order->laorderprovince) /*--}}
            {{--*/ $oDistrict = Config::get('shop.hcm_district.'.$order->laorderdistrict) /*--}}
            <td><a class="label label-primary" id="a{{$order->id}}" href="javascript:viewDetail({{$order->id}})"> {{$order->id}} </a></td>
            <td>{{date("H:i d/m/Y",strtotime($order->created_at))}}</td>
            <td><a class="sumpopup" title="{{$details}}" data-placement="right">{{number_format($order->sumsanpham - $order->giamvoucher + $order->lafeeshipping,0,',','.')}}</a></td>
            <td>{{$order->laordername}}</td>
            <td>{{$order->laordertel}}</td>
            <td>{{$order->laorderaddr}},
                {{(($oDistrict!=null)?$oDistrict['title'].',':'')}}
                {{$oProvince['title']}}</td>
            <td>{{$oShipping['value']}}</td>
            <td><a href="javascript:findtrackid('{{$order->latrackid}}')">{{$order->latrackid}}</a></td>
            <td>{{$oPayment['value']}}</td>
            <td>{{nl2br($order->laordernote)}}</td>
            <td id="status{{$order->id}}"><span class="label label-{{Config::get('shop.orderstatus.'.$order->order_status.'.color')}}">{{Config::get('shop.orderstatus.'.$order->order_status.'.value')}}</span></td>
            <td>{{date("H:i d/m/Y",strtotime($order->updated_at))}}</td>
        </tr>
        @endforeach
    </table>
    {{$oOrders->links()}}
    <div class="clearfix" id="loading" style="display: block;height: 20px;width: 100%"></div>
    <table class="table table-responsive table-bordered" id="trackcontent">
    </table>

    <div class="bg-warning" id="trackinfo"></div>
    <br><br>
</div>
@stop
@section('jscript')
<script>

     function viewDetail(orderid){
         if($("#append"+orderid).length <=0)
             $.ajax({
                 url:"{{URL::to('/cart/vieworderdetails/')}}/"+orderid,
                 type:"get",
                 success:function(msg){
                     $("#tr"+orderid).after("<tr id='append"+orderid+"'><td><button type='button' class='close' aria-hidden='true' onclick='closetr(\""+orderid+"\")' class='close'>&times;</button></td><td colspan='10'>"+msg+"</td></tr>");
                 }
             })
     }
     function closetr(orderid){
         $("#append"+orderid).remove();
     }
     $('.sumpopup').tooltip({html:true});
    function findtrackid(trackid){
        $("#loading").addClass("ajaxload");
        $("#trackcontent").html("");
        $("#trackinfo").html("");
        $.ajax({
            url:"{{URL::to('/cart/findtrackid/')}}/"+trackid,
            success:function(msg){
                $("#loading").removeClass("ajaxload");
                $("#trackcontent").html(msg);
                $("#trackinfo").html('<span class="glyphicon glyphicon-info-sign"></span> Dữ liệu được lấy từ trang vnpost.vn. Mã bưu chính huyện cụ thể sẽ được cập nhật khi có dữ liệu');
            }
        });
    }
     </script>
@stop
