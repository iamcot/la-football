@if(!isset($catedit))
{{--*/ $catedit = null /*--}}
@endif
{{ Form::open(
    array(
    'url'=>'admin/factor',
    'files' => true)
) }}
<div class="span4">
    {{ Form::hidden('id',(($catedit != null)?$catedit->id:'')) }}
    <div class="input-group">
    {{ Form::label('laurl','Nhà sản xuất',array("class"=>"input-group-addon")) }}
    {{ Form::text('latitle',(($catedit != null)?$catedit->latitle:''),array("class"=>"form-control" ) ) }}
    </div>
    <br>
    <div class="input-group">
    {{ Form::label('laurl','URL ',array("class"=>"input-group-addon"),array("class"=>"input-group-addon")) }}
    {{ Form::text('laurl',(($catedit != null)?$catedit->laurl:''),array("class"=>"form-control",'id'=>'laurl' ) ) }}
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
    <div class="input-group">
    {{ Form::submit("Lưu",array('class'=>'btn btn-success')) }}
    </div>

    {{ Form::close() }}

</div>
<div class="span3">
    @if ($catedit != null && $catedit->laimage!='')
        {{HTML::image('uploads/factor/'.$catedit->id.'/'.$catedit->laimage)}}
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
