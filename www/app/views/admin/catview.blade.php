    <a class="btn btn-success pull-right btn-sm"  href="{{url('admin/cat/create')}}">Tạo thư mục mới </a>
<div class="clearfix"></div><br>
<table class="table mylist table-bordered table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên thư mục</th>
            <th>URL</th>
            <th style="width: 40%">Thông tin</th>
            <th>Ảnh</th>
            <th>Thứ tự</th>
        </tr>
    </thead>
    <tbody>
        {{$cats}}
    </tbody>
</table>