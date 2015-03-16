<div id="cartpage" class="container-fluid">
    <div class="col-xs-12">
        @if($orderinfo != null)
        <h3>Mã Đơn hàng: <strong class="text-danger">{{$orderinfo->id}}</strong>
        </h3>
        @include(Config::get('shop.theme').'/cart/checkoutcontent')
        @else
            <p class="bg-danger">Thông tin đơn hàng không tồn tại</p>
        @endif
    </div>
</div>
