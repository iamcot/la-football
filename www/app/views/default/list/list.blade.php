@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div class="container-fluid lists" itemscope itemtype="http://schema.org/ItemList">
    @if(!isset($issearch))
    <div class="text-right container-fluid">
        {{ Form::open() }}
             <button name="giatang" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-sort-by-attributes"></span> Giá</button>
             <button name="giagiam" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Giá</button>
             <button name="tentang" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Tên</button>
             <button name="tengiam" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-sort-by-alphabet-alt"></span> Tên</button>
        <p></p>
        {{ Form::close() }}
    </div>
    @endif

    @if( isset($lists) && $lists != null && count($lists)>0 )
    <div class="row-fluid ">
        @foreach($lists as $list)
            @include(Config::get('shop.theme').'/list/listitem')
        @endforeach
    </div>
    <div class="text-center clearfix">
        {{$lists->links()}}
    </div>
    @endif
</div>
@stop