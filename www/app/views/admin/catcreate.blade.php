@if(!isset($catedit))
{{--*/ $catedit = null /*--}}
@endif
{{ Form::open(
    array(
    'url'=>'admin/cat',
    'files' => true)
) }}
<div class="span4">
    {{ Form::hidden('id',(($catedit != null)?$catedit->id:'')) }}
    <div class="input-group">
    {{ Form::label('laurl','Tên Thư mục',array("class"=>"input-group-addon")) }}
    {{ Form::text('latitle',(($catedit != null)?$catedit->latitle:''),array("class"=>"form-control" ) ) }}
    </div>
    <br>
    <div class="input-group">
    {{ Form::label('laurl','URL ',array("class"=>"input-group-addon"),array("class"=>"input-group-addon")) }}
    {{ Form::text('laurl',(($catedit != null)?$catedit->laurl:''),array("class"=>"form-control",'id'=>'laurl' ) ) }}
    </div>
    <br>
    <div class="input-group">
    {{ Form::label('laparent_id','Thư mục cha ',array("class"=>"input-group-addon")) }}
    <select name="laparent_id" class="form-control">{{$cats}}</select>
    </div>
    <br>
    <div class="input-group">
    {{ Form::label('laorder','Thứ tự',array("class"=>"input-group-addon")) }}
    {{ Form::text('laorder',(($catedit != null)?$catedit->laorder:'' ),array("class"=>"form-control") ) }}
    </div>
    <br>

    <div class="input-group">
    {{ Form::label('lainfo','Thông tin ',array("class"=>"input-group-addon")) }}
    {{ Form::textarea('lainfo',(($catedit != null)?$catedit->lainfo:'') ,array('rows'=>3,"class"=>"form-control") ) }}
    </div>
    <br>
    <div class="">
    {{ Form::label('laimage','Ảnh đại diện ') }}
    {{ Form::file('laimage','') }}
    </div>
    <br>
    <label>
        <input type="checkbox" name="ladeleted" {{((isset($catedit) && $catedit->ladeleted==1)?'':'checked=checked')}}> Kích hoạt
    </label>
    <br>
    <div class="input-group">
    {{ Form::submit("Lưu",array('class'=>'btn btn-success')) }}
    </div>

    {{ Form::close() }}

</div>
<div class="span3">
    @if ($catedit != null && $catedit->laimage!='')
        {{HTML::image('uploads/cat/'.$catedit->id.'/'.$catedit->laimage)}}
    @endif
</div>
@section('jscript')
{{HTML::script('src/jquery.friendurl.js')}}
<script>
 $(function () {
     $('input[name=latitle]').friendurl({id : 'laurl'});
 });
</script>
@stop
