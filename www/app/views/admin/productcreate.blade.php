@if(!isset($catedit))
{{--*/ $catedit = null /*--}}
@endif
{{ Form::open(
array(
'url'=>'admin/product',
'files' => true)
) }}
@section('morestyle')
{{HTML::style('src/jupload/css/jquery.fileupload.css')}}
{{HTML::style('src/jupload/css/jquery.fileupload-ui.css')}}
{{HTML::style('src/ckeditor/skins/moono/editor.css')}}
@stop
@if(isset($notice))
      <div class="bg-warning">
          {{$notice}}
      </div>
<br>
@endif
<div class="span5">
    {{ Form::hidden('id',(($catedit != null)?$catedit->id:'')) }}
    <div class="input-group">
        {{ Form::label('laurl','Tên sản phẩm',array("class"=>"input-group-addon")) }}
        {{ Form::text('latitle',(($catedit != null)?$catedit->latitle:''),array("class"=>"form-control" ) ) }}
    </div>
    <br>
    <div class="input-group">
        {{ Form::label('laurl','URL ',array("class"=>"input-group-addon")) }}
        {{ Form::text('laurl',(($catedit != null)?$catedit->laurl:''),array("class"=>"form-control",'title'=>'Đường dẫn seo' ) ) }}
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
        {{ Form::label('laamount','Số lượng',array("class"=>"input-group-addon")) }}
        {{ Form::text('laamount',(($catedit != null)?$catedit->laamount:''),array("class"=>"form-control" ) ) }}
    </div>
    <br>

    <div class="input-group">
        {{ Form::label('lashortinfo','Thông tin ngắn',array("class"=>"input-group-addon")) }}
        {{ Form::textarea('lashortinfo',(($catedit != null)?$catedit->lashortinfo:'') ,array('rows'=>3,"class"=>"form-control",'title'=>'Thông tin ngắn về sản phẩm, sẽ hiện trong mục description') )
        }}
    </div>


    <br>

</div>
<div class="span5">
    <div class="checkbox">
        <label>
            <input type="checkbox" name="ladeleted" {{((isset($catedit) && $catedit->ladeleted==1)?'':'checked=checked')}}> Kích hoạt
        </label>
    </div>

    <br>

    <div class="input-group">
        {{ Form::label('lamanufactor_id','Nhà sản xuất',array("class"=>"input-group-addon")) }}
        <select name="lamanufactor_id" class="form-control">{{$factors}}</select>
    </div>
    <br>
    <div class="input-group">
        {{ Form::label('laoldprice','Giá cũ ',array("class"=>"input-group-addon"))
        }}
        {{ Form::text('laoldprice',(($catedit != null)?$catedit->laoldprice:''),array("class"=>"form-control",'title'=>'Giá cũ, dùng để hiện % giảm' ) ) }}
    </div>
    <br>
    <div class="input-group">
        {{ Form::label('ladatenew','Ngày hàng mới',array("class"=>"input-group-addon"))
        }}
        {{ Form::text('ladatenew',(($catedit != null)?$catedit->ladatenew:''),array("class"=>"form-control",'title'=>'Sản phẩm sẽ hiện "mới" cho tới ngày này' ) ) }}
    </div>
    <br>
    <div class="input-group">
        {{ Form::label('lakeyword','Từ khóa',array("class"=>"input-group-addon")) }}
        {{ Form::text('lakeyword',(($catedit != null)?$catedit->lakeyword:''),array("class"=>"form-control",'title'=>'Các tag và keywords sẽ hiện trong meta, phân cách bằng dấu phẩy' ) ) }}
    </div>
    <br>

    <div class="input-group">
        {{ Form::label('lauseguide','HDSD',array("class"=>"input-group-addon")) }}
        {{ Form::textarea('lauseguide',(($catedit != null)?$catedit->lauseguide:'') ,array('rows'=>3,"class"=>"form-control") )
        }}
    </div>


</div>
<div class="clearfix"></div>
<br>
{{ Form::label('morepic','Hình Ảnh') }}
<input id="fileupload" type="file" name="files[]" data-url="{{URL::to('/upload/calljupload/product')}}" multiple >

<div id="progress" style="width:50%">
    <div class="bar" style="width: 0%;"></div>
</div>
<table id="uploadlinks" style="width: 100%">
    {{--*/ $currmorepic = 0 /*--}}
    @if(isset($morepics))
    @foreach($morepics as $pic)
    <tr id='tr{{$currmorepic}}'>
        <td style='padding: 3px;'>
            <input type='radio' name='laimage' value='{{$pic->lapic}}' {{(($pic->lapic == $catedit->laimage)?'checked=checked':'')}}>
            <input type='hidden' name='mprepictype{{$currmorepic}}' value="old">
            <img style='max-height: 50px;max-width: 50px;' src='{{URL::to('/uploads/thumbnails/product/'.$pic->lapic)}}'>
            </td><td  style='padding: 3px;'>
             <input style='width: 100%' type='text' name='morepic{{$currmorepic}}' value='{{$pic->lapic}}'>
             <input style='width: 100%' type='text' name='morepictext{{$currmorepic}}' value='{{$pic->latitle}}'>
            </td>
        <td>
            <input style='width: 100%' type='text'  value='{{URL::to("/uploads/product/".$pic->lapic)}}'>
            <input style='width: 100%' type='text'  value='{{URL::to("/uploads/thumbnails/product/".$pic->lapic)}}'>
        </td>
                <td>
             <a href='javascript:delpic("{{$pic->lapic}}",{{$currmorepic}})'><span class='glyphicon glyphicon-trash'></span></a>
            </td></tr>
    {{--*/ $currmorepic += 1 /*--}}
    @endforeach
    @endif
</table>
<input type="hidden" id="currmorepic" name="currmorepic" value="{{$currmorepic}}">
<br>
<div class="">
    {{ Form::label('lainfo','Thông tin ',array()) }}
    {{ Form::textarea('lainfo',(($catedit != null)?$catedit->lainfo:'') ,array("class"=>"ckeditor") )
    }}
</div>
<br>

<div class="input-group">
    {{ Form::submit("Lưu",array('class'=>'btn btn-success')) }}
</div>
{{ Form::close() }}
@section('jscript')
{{HTML::script('src/jupload/js/vendor/jquery.ui.widget.js')}}
{{HTML::script('src/jupload/js/jquery.iframe-transport.js')}}
{{HTML::script('src/jupload/js/jquery.fileupload.js')}}
{{HTML::script('src/jupload/js/jquery.fileupload-process.js')}}
{{HTML::script('src/ckeditor/ckeditor.js')}}
{{HTML::script('src/ckeditor/adapters/jquery.js')}}
<script>
    function delpic(filename,id){
        $.ajax({
            url:"{{URL::to('/upload/delpic/product')}}/"+filename,
            success:function(msg){
                if(msg==1){
                    $('#uploadlinks #tr'+id).remove();
                }
            }
        });
    }
    $(function () {
        $( '.ckeditor' ).ckeditor({
            language: 'vi',
            height:80,
            toolbarGroups: [
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'links' },
                { name: 'insert' },
                '/',
                { name: 'styles' },
                { name: 'colors' }

            ]

        });
        $('input[name=ladatenew]').datepicker({"format":"dd/mm/yyyy"});
        $('.form-control').tooltip();

            $('#fileupload').fileupload({
                dataType: 'json',
                start:function(e){
                    $('#progress .bar').css(
                        'width',
                        '0%'
                    );
                },
                done: function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        $('#uploadlinks').append( "<tr id='tr"+$("#currmorepic").val()+"'>" +
                            "<td style='padding: 3px;'>" +
                            "<input type='radio' name='laimage' value='"+file.name+"' "+((parseInt($("#currmorepic").val())==0)?"checked=checked":"")+"> " +
                            "<input type='hidden' name='mprepictype"+$("#currmorepic").val()+"' value='new'>" +
                            "<img style='max-height: 50px;max-width: 50px;' src='"+file.thumbnailUrl+"'>" +
                            "</td><td  style='padding: 3px;'>" +
                            " <input style='width: 100%' type='text' name='morepic"+$("#currmorepic").val()+"' value='"+file.name+"'>" +
                            " <input style='width: 100%' type='text' name='morepictext"+$("#currmorepic").val()+"' value=''>" +
                            "</td>" +
                            " <td>"+
                            "<input style='width: 100%' type='text'  value='{{URL::to("/uploads/product")}}/"+file.name+"'>"+
                            "<input style='width: 100%' type='text'  value='{{URL::to("/uploads/thumbnails/product")}}/"+file.name+"'>"+
                            "</td>" +
                            "<td>" +
                            " <a href='javascript:delpic(\""+file.name+"\","+$("#currmorepic").val()+")'><span class='glyphicon glyphicon-trash'></span></a>" +
                            "</td></tr>");
                        $('#progress .bar').css(
                            'width',
                            '0%'
                        );
                        $("#currmorepic").val( parseInt($("#currmorepic").val())+1);
                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .bar').css(
                        'width',
                        progress + '%'
                    );
                }
            });
        });
</script>
@stop