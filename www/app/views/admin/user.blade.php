@extends('layout')
@section('body')
<div class="span12">
    {{--*/ $adminNav = Config::get('admin.adminnav') /*--}}
    {{--*/ $strActCat = $adminNav[$actCat] /*--}}
    <h2><strong>{{trans('common.'.$strActCat['title'])}}</strong></h2>

</div>

<div class="col-xs-12">
    <table class="table table-bordered table-responsive">
        <thead>
        <tr class="">
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Fullname</th>
            <th>Role</th>
            <th>Email</th>
        </tr>
        </thead>

        @foreach($aUsers as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td><input type=text id="pass{{$user->id}}"><button onclick="changepass({{$user->id}})">Đổi pass</button></td>
                <td>{{$user->lafullname}}</td>
                <td>{{$user->larole}}</td>
                <td>{{$user->laemail}}</td>
            </tr>
        @endforeach
        <tr>
            <td><button onclick="create()">Tạo mới</button></td>
            <td><input type=text id="usernew"></td>
            <td><input type=text id="passnew"></td>
            <td><input type=text id="fullnamenew"></td>
            <td><input type=text id="rolenew"></td>
            <td><input type=text id="emailnew"></td>
        </tr>
    </table>
</div>
@stop
@section('jscript')
     <script>
         function changepass(id){
             $.ajax({
                 url:"{{URL::to('admin/changepass')}}/"+id,
                 data: "password="+$("#pass"+id).val(),
                 success:function(msg){
                     if(msg == 1){
                         alert("OK");
                         window.location.reload(true);
                     }
                     else{
                         alert("FAIL");
                     }

                 }
             })
         }
         function create(){
             $.ajax({
                 url:"{{URL::to('admin/createuser')}}/",
                 data: "username="+$("#usernew").val()
                     +"&password="+$("#passnew").val()
                     +"&lafullname="+$("#fullnamenew").val()
                     +"&larole="+$("#rolenew").val()
                     +"&laemail="+$("#emailnew").val(),
                 success:function(msg){
                     window.location.reload(true);
                 }
             })
         }
     </script>
@stop