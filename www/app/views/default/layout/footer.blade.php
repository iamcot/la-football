@section('footer')
<div id="footer" >
    <div class="container">
        <div class="col-xs-12 col-md-6 hidden-xs hidden-sm">
            <div class="fb-like-box" data-href="https://www.facebook.com/ThaiBoutique88" data-width="445" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
        </div>
        <div class="col-xs-6 col-md-3">
            <dl>
                <dt>Thông tin</dt>
                <dd><a href="{{URL::to('/tin-tuc/gioi-thieu.html')}}"><span class="glyphicon glyphicon-chevron-right"></span> Giới thiệu</a></dd>
                <dd><a href="{{URL::to('/tin-tuc/ship-hang.html')}}"><span class="glyphicon glyphicon-chevron-right"></span> Mức phí và cách ship hàng</a></dd>
                <dd><a href="{{URL::to('/tin-tuc/doi-hang.html')}}"><span class="glyphicon glyphicon-chevron-right"></span> Quy định đổi - trả</a></dd>
                <dd><a href="{{URL::to('/tin-tuc/thanh-toan.html')}}"><span class="glyphicon glyphicon-chevron-right"></span> Thanh toán</a></dd>
            </dl>
        </div>
        <div class="col-xs-6 col-md-3">
            <dl>
                <dt><span class="glyphicon glyphicon-heart"></span> Thái Boutique</strong></dt>
                <dl>
                    <address>
                        <span class="glyphicon glyphicon-map-marker"></span> TP Hồ Chí Minh<br>
                        <span class="glyphicon glyphicon-phone-alt"></span> 098.3717.098<br>
                        <span class="glyphicon glyphicon-phone-alt"></span> 0933.81.64.18
                    </address>

                </dl>
            </dl>
        </div>
    </div>

    <div class="clearfix"></div>
    <div id="copyright" class="text-right container-fluid wrap">
        <small> Copyright &copy; {{date("Y")}} by Thái Boutique - webmypham.net </small>
    </div>
</div>
@show