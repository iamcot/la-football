<table class="table mylist">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên nhà sản xuất</th>
            <th>URL</th>
            <th>Thông tin</th>
            <th>Ảnh</th>
            <th>Thứ tự</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cats as $fac)
            <tr>
                <td>{{$fac->id}}</td>
                <td>{{link_to('admin/editfactor/' . $fac->id, $fac->latitle)}}</td>
                <td>{{$fac->laurl}}</td>
                <td>{{$fac->lainfo}}</td>
                <td class='imgthumb'>{{ HTML::image('uploads/factor/' . $fac->id . '/' . $fac->laimage, 'IMG') }}</td>
                <td>{{$fac->laorder}}</td>
            </tr>
        @endforeach
    </tbody>
</table>