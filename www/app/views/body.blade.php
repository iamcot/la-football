@extends('layout')
@section('body')
    @foreach($user as $u)
        <p>{{{$u->lausername}}}</p>
    @endforeach
@stop