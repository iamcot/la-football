@if (Auth::check())
{{--*/ $data = Auth::user() /*--}}
@endif
@if(Session::has('message'))
@section('errorpage')
<div class="bg-danger">
    <div class="container-fluid wrap">
        {{ Session::get('message')}}
    </div>
</div>
@stop
@endif
@if (!empty($data))
Hello, {{{ $data['name'] }}}
<img src="{{ $data['photo']}}"> |
<a href="logout">Logout</a>
@else
<a href="login/fb">Login with Facebook</a>
@endif