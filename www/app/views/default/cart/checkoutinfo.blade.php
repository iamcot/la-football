@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div id="cartpage" class="container-fluid">

    <div class="col-xs-12">
        @if($orderinfo != null)
        <div class="bg-success hidden-print"><strong>Đơn hàng đã được gửi đi, chúng tôi sẽ liên hệ giao hàng cho quý khách trong thời gian sớm nhất.</strong>
            <br>
            @if($orderinfo->laorderemail != '')
            Thông tin hóa đơn cũng đã được gửi về email: {{$orderinfo->laorderemail}}
            @endif
        </div>
        <h3>Mã Đơn hàng: <strong class="text-danger">{{$orderinfo->id}}</strong>

            <a title="In đơn hàng hoặc save về định dạnh PDF" href="javascript:window.print()" class="btn btn-success hidden-print pull-right"><span class="glyphicon glyphicon-print"></span> In đơn hàng</a>
        </h3>
        @include(Config::get('shop.theme').'/cart/checkoutcontent')
        @else
            <p class="bg-danger">Thông tin đơn hàng không tồn tại</p>
        @endif
    </div>
</div>
@stop

