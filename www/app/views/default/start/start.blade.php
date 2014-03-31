@extends(Config::get('shop.theme').'/layout/page')
@section('pagecontent')
<div>

    @include(Config::get('shop.theme').'/start/slider')
    @include(Config::get('shop.theme').'/start/randcat')
</div>
@stop