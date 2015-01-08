<div id="sidebar" class="{{$sidebartype}} col-xs-12 col-sm-4 col-md-3">

    {{--*/ $cattree = Vcategory::shopCatTree(0,$categories) /*--}}
    {{$cattree}}
    <div class="clearfix"></div>
    <div class="sidebarBox">
        <h3>Đăng ký bản tin</h3>

        <div class="small">Đăng ký email để nhận được thông tin khuyến mãi của shop một cách nhanh
                           nhất.
        </div>
        <div class="col-xs-8" style="padding-left: 0 !important;padding-right: 0 !important;">
            <input class="form-control " id="newsletter" placeholder="abc@mail.com">
        </div>
        <div class="col-xs-3">
            <button class="btn btn-primary" onclick="savenewsletter()">Gửi</button>
        </div>
        <div class="clearfix"></div>
        <br>
    </div>
    <div class="clearfix"></div>
    {{--*/ $sidebarads = Myconfig::buildSidebarads() /*--}}

    @foreach($sidebarads as $ads)
    <div class="sidebarBox">
        <a href="{{URL::to($ads['link'])}}">
            {{ HTML::image('/uploads/thumbnails/product/'.$ads['pic'],$ads['title']) }}
        </a>
    </div>
    @endforeach
</div>
@section('jscript')
<script>
    function savenewsletter() {
        var email = $("#newsletter").val();
        if (IsEmail(email)) {
            $.ajax({
                type: "POST",
                url: "{{URL::to('ajax/savenewsletter')}}/" + email,
                success: function (msg) {
                    if(msg > 0)
                    alert("Bạn đã đăng ký bản tin thành công, những tin tức khuyến mãi mới nhất sẽ gửi về email "+email);

                    else if(msg == -1)
                    alert("Email này đã đăng kí");
                    else
                        alert("Đăng ký email thất bại, vui lòng thử lại.");
                }

            });
        }
        else {
            alert("Email bạn nhập vào (" + email + ") không đúng!")
        }
    }
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
</script>
@stop