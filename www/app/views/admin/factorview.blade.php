<a class="btn btn-success pull-right btn-sm"  href="{{url('admin/factor/create')}}">Tạo nhà sản xuất mới </a>
<div class="clearfix"></div><br>
<table class="table mylist table-bordered table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên nhà sản xuất</th>
            <th>URL</th>
            <th style="width: 40%">Thông tin</th>
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