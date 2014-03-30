@extends('layout')
@section('body')
<div class="container-fluid wrap">
    <div id="content">
        <div>

            @if($slider!='')
                @include(Config::get('shop.theme').'/slider')
            @endif
        </div>
    </div>
    <div id="sidebar">
        {{$cattree}}
    </div>

</div>
@stop