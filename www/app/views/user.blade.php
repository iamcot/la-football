@if (Auth::check())
{{--*/ $data = Auth::user() /*--}}
@if($data->isAdmin())
<li><a href="{{URL::to('admin')}}">{{{ $data->lafullname }}}</a> </li>
@else
<li>{{{ $data->lafullname }}} </li>
@endif
@if($data->laphoto!='')
<li><img src="{{$data->laphoto}}"> </li>
@endif
<li>&nbsp;|&nbsp;<a href="{{URL::to('logout')}}">Logout</a> </li>

@else
<li><a href="login/fb">Login with Facebook</a></li>
@endif