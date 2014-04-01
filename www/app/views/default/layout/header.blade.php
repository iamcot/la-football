@section('header')
<div id="header" class="container-fluid wrap">
    <div class="pull-left col-xs-8">

        <div id="logo" class="pull-left">
            Thái boutique
        </div>
        <div id="search" class="pull-right col-xs-8">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Tên sản phẩm, mã đơn hàng...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" style="font-size: 20px"></span></button>
                      </span>
                </div>
                <!-- /input-group -->
            </div>
        </div>

    </div>
    <div id="info" class="pull-right col-xs-3">
        <span class="small"><span class="glyphicon glyphicon-phone-alt "> </span> Hotline: <strong>098.3717.098</strong> - <strong>0933.81.64.18</strong></span>
    </div>
</div>
@show