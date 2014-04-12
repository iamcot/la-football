@if (Auth::check())
{{--*/ $data = Auth::user() /*--}}
@if($data->isAdmin())
<li><a href="{{URL::to('admin')}}">{{{ $data->lafullname }}}</a> </li>
@else
<li><a href="{{ URL::to('cart/uid/'.Session::get('uid')) }}">{{{ $data->lafullname }}} </a></li>
@endif
@if($data->laphoto!='')
<li style="line-height: 48px"><img src="{{$data->laphoto}}" style="max-height: 32px;max-width: 32px"> </li>
@endif
<li><a href="{{URL::to('logout')}}">Logout</a> </li>

@else
<li><a href="{{URL::to('facelogin')}}"><label  class="label label-primary" style="cursor: pointer">Đăng nhập bằng Facebook</label></a></li>
@endif