{{--*/ $factors = Factory::all() /*--}}
<div>
    <ul class="factorslist">
    @foreach($factors as $factor)
        <li><a href="{{URL::to($factor->laurl)}}">{{HTML::image('/uploads/factor/'.$factor->id.'/'.$factor->laimage)}}</a></li>
    @endforeach
    </ul>
</div>