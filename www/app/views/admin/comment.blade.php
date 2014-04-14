@extends('layout')
@section('body')
<div class="col-xs-12">
    <table class="table table-bordered table-responsive">
        <thead>
        <th>ID</th>
        <th>URL</th>
        <th>Ngày tạo</th>
        </thead>
        <tbody>
        @foreach($aComments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td><a target="_blank" href="{{$comment->laurl}}">{{$comment->laurl}}</a></td>
            <td>{{date("H:i d/m/Y",strtotime($comment->created_at))}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$aComments->links()}}
</div>

@stop

