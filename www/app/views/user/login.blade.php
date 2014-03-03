@extends("layout")
@section("body")
{{Form::open(array(
        "route" => "user/login",
        "autocomplete"=>"off"
)) }}
{{Form::label("lausername","Username") }}
{{Form::text("lausername", Input::old("lausername"), array("placeholder" =>"Ten Dang nhap") ) }}
{{Form::label("lapassword","Password") }}
{{Form::password("lapassword", Input::old("lapassword")) }}
{{Form::submit("login") }}
{{Form::close() }}
@stop
@section("footer")
    @parent
@stop
