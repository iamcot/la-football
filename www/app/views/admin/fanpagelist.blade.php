@if($fanpage !=null)
@foreach($fanpage as $page)
<tr>
    <td>{{$page->pageid}}</td>
    <td>{{$page->pageusername}}</td>
    <td>{{$page->pagename}}</td>
    <td>{{$page->likes}}</td>
</tr>
@endforeach
@endif