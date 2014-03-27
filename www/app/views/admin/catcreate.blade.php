{{ Form::open() }}
{{ Form::hidden('id','') }}
{{ Form::label('latitle','Tên Thư mục') }}
{{ Form::text('latitle','') }}

{{ Form::label('laurl','URL ') }}
{{ Form::text('laurl','') }}

{{ Form::label('laparent_id','Thư mục cha ') }}
{{ Form::select('laparent_id',array(
    '0' => 'Thư mục gốc',
        ), 0 ) }}

{{ Form::label('laorder','Thứ tự') }}
{{ Form::text('laorder','') }}

{{ Form::label('lainfo','Thông tin ') }}
{{ Form::textarea('lainfo','',array('rows'=>3) ) }}

{{ Form::label('laimage','Ảnh đại diện ') }}
{{ Form::file('laimage','') }}

<div class="clearfix"></div>
{{ Form::submit("Lưu",array('class'=>'btn btn-success')) }}

{{ Form::close() }}