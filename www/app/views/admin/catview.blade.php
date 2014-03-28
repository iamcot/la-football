<table class="table mylist">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>URL</th>
            <th></th>
            <th>Info</th>
            <th>IMG</th>
            <th>Order</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cats as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{ link_to('admin/editcat/'.$cat->id,$cat->latitle) }}</td>
            <td>{{$cat->laurl}}</td>
            <td>{{$cat->laparent_id}}</td>
            <td>{{$cat->lainfo}}</td>
            <td class="imgthumb">{{HTML::image('uploads/cat/'.$cat->id.'/'.$cat->laimage,'IMG')}}</td>
            <td>{{$cat->laorder}}</td>
        </tr>
        @endforeach
    </tbody>
</table>