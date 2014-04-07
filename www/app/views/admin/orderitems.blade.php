<table class="table table-responsive carttable ">
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