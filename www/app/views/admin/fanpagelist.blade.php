@if($fanpage !=null)
@foreach($fanpage as $page)
<tr>
    <td><a href="{{URL::to('admin/fanpage/'.$page->pageid)}}">{{$page->pageid}}</a></td>
    <td>{{$page->pageusername}}</td>
    <td>{{$page->pagename}}</td>
    <td>{{$page->likes}}</td>
</tr>
@endforeach
@endif