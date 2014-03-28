@if(!isset($catedit))
{{--*/ $catedit = null /*--}}
@endif
{{ Form::open(
array(
'url'=>'admin/product',
'files' => true)
) }}
<div class="span4">
    {{ Form::hidden('id',(($catedit != null)?$catedit->id:'')) }}
    <div class="input-group">
        {{ Form::label('laurl','Tên sản phẩm',array("class"=>"input-group-addon")) }}
        {{ Form::text('latitle',(($catedit != null)?$catedit->latitle:''),array("class"=>"form-control" ) ) }}
    </div>
    <br>

    <div class="input-group">
        {{ Form::label('lacategory_id','Thư mục',array("class"=>"input-group-addon")) }}
        <select name="lacategory_id" class="form-control">{{$cats}}</select>
    </div>
    <br>



    <div class="input-group">
        {{ Form::label('laprice','Giá hiện tại
        ',array("class"=>"input-group-addon"),array("class"=>"input-group-addon")) }}
        {{ Form::text('laprice',(($catedit != null)?$catedit->laprice:''),array("class"=>"form-control",'title'=>'Giá hiển thị' ) ) }}
    </div>
    <br>

    <div class="input-group">
        {{ Form::label('laamount','Số lượng',array("class"=>"input-group-addon"),array("class"=>"input-group-addon")) }}
        {{ Form::text('laamount',(($catedit != null)?$catedit->laamount:''),array("class"=>"form-control" ) ) }}
    </div>
    <br>

    <div class="">
        {{ Form::label('laimage','Ảnh đại diện ') }}
        {{ Form::file('laimage','') }}
    </div>
    <br>

    <div class="input-group">
        {{ Form::label('lashortinfo','Thông tin ngắn',array("class"=>"input-group-addon")) }}
        {{ Form::textarea('lashortinfo',(($catedit != null)?$catedit->lashortinfo:'') ,array('rows'=>3,"class"=>"form-control",'title'=>'Thông tin ngắn về sản phẩm, sẽ hiện trong mục description') )
        }}
    </div>

    <br>
    <div class="input-group">
        {{ Form::label('lakeyword','Từ khóa',array("class"=>"input-group-addon"),array("class"=>"input-group-addon")) }}
        {{ Form::text('lakeyword',(($catedit != null)?$catedit->lakeyword:''),array("class"=>"form-control",'title'=>'Các tag và keywords sẽ hiện trong meta, phân cách bằng dấu phẩy' ) ) }}
    </div>
    <br>
    <div class="input-group">
        {{ Form::label('lauseguide','HDSD',array("class"=>"input-group-addon")) }}
        {{ Form::textarea('lauseguide',(($catedit != null)?$catedit->lauseguide:'') ,array('rows'=>3,"class"=>"form-control") )
        }}
    </div>
    <br>

</div>
<div class="span4">
    <div class="input-group">
        {{ Form::label('laurl','URL ',array("class"=>"input-group-addon"),array("class"=>"input-group-addon")) }}
        {{ Form::text('laurl',(($catedit != null)?$catedit->laurl:''),array("class"=>"form-control",'title'=>'Đường dẫn seo' ) ) }}
    </div>
    <br>

    <div class="input-group">
        {{ Form::label('lamanufactor_id','Nhà sản xuất',array("class"=>"input-group-addon")) }}
        <select name="lamanufactor_id" class="form-control">{{$factors}}</select>
    </div>
    <br>
    <div class="input-group">
        {{ Form::label('laoldprice','Giá cũ ',array("class"=>"input-group-addon"),array("class"=>"input-group-addon"))
        }}
        {{ Form::text('laoldprice',(($catedit != null)?$catedit->laoldprice:''),array("class"=>"form-control",'title'=>'Giá cũ, dùng để hiện % giảm' ) ) }}
    </div>
    <br>
    <div class="input-group">
        {{ Form::label('ladatenew','Ngày hàng mới',array("class"=>"input-group-addon"),array("class"=>"input-group-addon"))
        }}
        {{ Form::text('ladatenew',(($catedit != null)?$catedit->ladatenew:''),array("class"=>"form-control",'title'=>'Sản phẩm sẽ hiện "mới" cho tới ngày này' ) ) }}
    </div>
    <br>
    @if ($catedit != null && $catedit->laimage!='')
    {{HTML::image('uploads/product/'.$catedit->id.'/'.$catedit->laimage)}}
    @endif



</div>
<div class="clearfix"></div>
<br>

<div class="input-group">
    {{ Form::label('lainfo','Thông tin ',array("class"=>"input-group-addon")) }}
    {{ Form::textarea('lainfo',(($catedit != null)?$catedit->lainfo:'') ,array('rows'=>3,"class"=>"form-control") )
    }}
</div>
<br>

<div class="input-group">
    {{ Form::submit("Lưu",array('class'=>'btn btn-success')) }}
</div>
{{ Form::close() }}
@section('jscript')
<script>
    $('.form-control').tooltip();
    $('input[name=ladatenew]').datepicker({"format":"dd/mm/yyyy"});
</script>
@stop