@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div class="container-fluid lists">
    @if($lists != null)
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