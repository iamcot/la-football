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
    {{ Form::label('latitle','Tên Thư mục') }}
    {{ Form::text('latitle',(($catedit != null)?$catedit->latitle:'') ) }}

    {{ Form::label('laurl','URL ') }}
    {{ Form::text('laurl',(($catedit != null)?$catedit->laurl:'') ) }}

    {{ Form::label('laparent_id','Thư mục cha ') }}
    {{ Form::select('laparent_id',$cats, (($catedit != null)?$catedit->laparent_id:'') ) }}

    {{ Form::label('laorder','Thứ tự') }}
    {{ Form::text('laorder',(($catedit != null)?$catedit->laorder:'') ) }}

    {{ Form::label('lainfo','Thông tin ') }}
    {{ Form::textarea('lainfo',(($catedit != null)?$catedit->lainfo:'') ,array('rows'=>3) ) }}

    {{ Form::label('laimage','Ảnh đại diện ') }}
    {{ Form::file('laimage','') }}

    <div class="clearfix"></div>
    {{ Form::submit("Lưu",array('class'=>'btn btn-success')) }}

    {{ Form::close() }}
</div>
<div class="span3 bottom">
    @if ($catedit != null && $catedit->laimage!='')
        {{HTML::image('uploads/cat/'.$catedit->id.'/'.$catedit->laimage)}}
    @endif
</div>
