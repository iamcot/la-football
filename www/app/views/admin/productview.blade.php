<table class="table mylist">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sản phẩm</th>
            <th>URL</th>
            <th>Giá</th>
            <th>Thư mục</th>
            <th>Nhà SX</th>
            <th>Thông tin ngắn</th>
            <th>Ảnh</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{link_to('admin/editproduct/' . $product->id, $product->latitle)}}</td>
                <td>{{$product->laurl}}</td>
                <td>{{number_format($product->laprice,0,',','.')}}</td>
                <td>{{$product->catname}}</td>
                <td>{{$product->factorname}}</td>
                <td>{{$product->lashortinfo}}</td>
                <td class='imgthumb'>{{ HTML::image('uploads/thumbnails/product/' . $product->laimage, 'IMG') }}</td>
            </tr>
        @endforeach
    </tbody>
    {{$products->links()}}
</table>