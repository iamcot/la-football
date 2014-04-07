@extends('layout')
@section('body')
<div class="span12">
    {{--*/ $adminNav = Config::get('admin.adminnav') /*--}}
    {{--*/ $strActCat = $adminNav[$actCat] /*--}}
    <h2><strong>{{trans('common.'.$strActCat['title'])}}</strong></h2>

</div>

<div class="col-xs-12">
    <table class="table table-bordered table-responsive">
        <thead>
        <tr class="">
            <th>Mã đơn hàng</th>
            <th>Tổng giá trị</th>
            <th>Khách hàng</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Giao hàng</th>
            <th>Thanh toán</th>
            <th>Trạng thái</th>
            <th>Ngày đặt</th>
            <th></th>
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
            <td><a class="label label-primary" href="javascript:viewDetail({{$order->id}})"> {{$order->id}} </a></td>
            <td><a class="sumpopup" title="{{$details}}" data-placement="right">{{number_format($order->sumsanpham - $order->giamvoucher + $order->lafeeshipping,0,',','.')}}</a></td>
            <td>{{$order->laordername}}</td>
            <td>{{$order->laordertel}}</td>
            <td>{{$order->laorderaddr}},
                {{(($oDistrict!=null)?$oDistrict['title'].',':'')}}
                {{$oProvince['title']}}</td>
            <td>{{$oShipping['value']}}</td>
            <td>{{$oPayment['value']}}</td>
            <td id="status{{$order->id}}"><span class="label label-{{Config::get('shop.orderstatus.'.$order->order_status.'.color')}}">{{Config::get('shop.orderstatus.'.$order->order_status.'.value')}}</span></td>
            <td>{{$order->created_at}}</td>
            <td>
                <select onchange="changestatus({{$order->id}},this.value)">
                    @foreach(Config::get('shop.orderstatus') as $key=>$status)
                        <option value="{{$key}}" {{(($key == $order->order_status )?'selected':'')}}>{{$status['value']}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    @endforeach
    </table>
    {{$oOrders->links()}}
</div>
@stop
@section('jscript')
     <script>
     function changestatus(orderid,status){
         $.ajax({
             url:"{{URL::to('/admin/changeorderstatus/')}}/"+orderid+"/"+status,
             type:"get",
             success:function(msg){
                $("#status"+orderid).html(msg);
             }
         })
     }
     function viewDetail(orderid){
         $.ajax({
             url:"{{URL::to('/admin/vieworderdetails/')}}/"+orderid,
             type:"get",
             success:function(msg){
                 $("#tr"+orderid).after("<tr id='append"+orderid+"'><td><button type='button' class='close' aria-hidden='true' onclick='closetr(\""+orderid+"\")' class='close'>&times;</button></td><td colspan='9'>"+msg+"</td></tr>");
             }
         })
     }
     function closetr(orderid){
         $("#append"+orderid).remove();
     }
     $('.sumpopup').tooltip({html:true});
     </script>
@stop
