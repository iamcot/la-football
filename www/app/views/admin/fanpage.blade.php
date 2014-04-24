@extends('layout')
@section('body')
<div class="span12">
    {{--*/ $adminNav = Config::get('admin.adminnav') /*--}}
    {{--*/ $strActCat = $adminNav[$actCat] /*--}}
    <h2><strong>{{trans('common.'.$strActCat['title'])}}</strong></h2>

</div>

<div class="col-xs-12 col-md-5">
    <input type="text" id="fanpageusername" placeholder="Tên url fanpage">
    <button onclick="getfanpage()" class="btn btn-success">Lấy thông tin Fanpage</button>
    <div class="clearfix"><br></div>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>Page ID</th>
            <th>Page username</th>
            <th>Name</th>
            <th>Likes</th>
        </tr>
        </thead>
        <tbody id="fanpagelist">

        </tbody>
    </table>
</div>
<div class="col-xs-12 col-md-7">
    @if($fanpage != null)
    {{Form::open(array(
    'url' => URL::to('admin/fanpage/'.$fanpage->pageid)
    )
    )}}
    <label class="label label-primary">{{$sumfan}}/{{$fanpage->likes}}</label>
    <button type="submit" name="getmore" class="btn btn-success">Get more</button>

    {{Form::close()}}
    <div class="clearfix"><br></div>
    <h4>{{$fanpage->pagename}}</h4>
    {{$users->links()}}
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>Name</th>
            <th>ID</th>
            <th>Username</th>
            <th>Gender</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                  <td>{{$user->facebookname}}</td>
                  <td>{{$user->facebookid}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{$user->gender}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@stop
@section('jscript')
<script>
     $(function () {
         loadfanpage();
     });
     function getfanpage() {
         var pageusername = $("#fanpageusername").val();
         if (pageusername.trim() == "") {
             alert("Chưa nhập fanpage");
             return;
         }
         $.ajax({
             url: "{{URL::to('admin/savefanpage')}}/" + pageusername,
             success: function (msg) {
                 loadfanpage();
             }
         });

     }
     function loadfanpage() {
         $.ajax({
             url: "{{URL::to('admin/loadfanpage')}}/",
             success: function (msg) {
                 $("#fanpagelist").html(msg);
             }
         });
     }
     </script>
@stop