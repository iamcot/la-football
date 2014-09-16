@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<h1>Danh sách email đã đăng ký</h1>
<div class="table-responsive bg-info">
<table class="table table-bordered">
    <thead class="bg-warning">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Ngày đăng ký</th>
    </tr>
    </thead>
    <tbody>
    @foreach($emails as $mail)
        <tr>
            <td>{{$mail->id}}</td>
            <td>{{$mail->email}}</td>
            <td>{{date('H:i d/m/Y',strtotime($mail->created_at))}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
{{$emails->links()}}
@stop