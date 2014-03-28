<table class="table mylist">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sản phẩm</th>
            <th>URL</th>
            <th>Thông tin</th>
            <th>Ảnh</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{link_to('admin/editproduct/' . $product->id, $product->latitle)}}</td>
                <td>{{$product->laurl}}</td>
                <td>{{$product->lainfo}}</td>
                <td class='imgthumb'>{{ HTML::image('uploads/product/' . $product->id . '/' . $product->laimage, 'IMG') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>