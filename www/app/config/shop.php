<?php

return array(
    'title' => 'Webmypham',
    'pretitle' => '',
    'suftitle' => '- WebMyPham - Chuyên cung cấp sỉ và lẻ mỹ phẩm Hàn Quốc - Thailand  - USA',
    'description' => 'Thái Boutique - Webmypham - Chuyên sỉ và lẻ mỹ phẩm Hàn Quốc, Thai lan, USA - Kem trắng da - Trị mụn - son - trang điểm',
    'keywords'  => 'mỹ phẩm, my pham, thai lan, thailan, the face shop, kem trắng da, kem trị mụn, kem mọc tóc, white, skin, beauty, spa, laila, mood matcher, wet n wild, nyx, revlon, kem dna ',
    'treecatdeep' => 1,
    'tablepp'    =>  18,
    'theme' => 'default',
    'topnav' => array(
        'home' => array(
            'id' => 'home',
            'url' => '/',
            'title' => 'Trang chủ',
            'icon' => 'glyphicon glyphicon-home',
        ),
        'new' => array(
            'id' => 'new',
            'url' => '/fav/new-arrived',
            'title' => 'Hàng mới về',
            'icon' => 'glyphicon glyphicon-star',
        ),
        'hot' => array(
            'id' => 'hot',
            'url' => '/fav/hot-product',
            'title' => 'Hàng đang hot',
            'icon' => 'glyphicon glyphicon-thumbs-up',
        ),
        'sale' => array(
            'id' => 'sale',
            'url' => '/fav/sale-product',
            'title' => 'Hàng khuyến mãi',
            'icon' => 'glyphicon glyphicon-gift',
        ),
    ),
    'shipping' => array(
        'ship_shop' => array(
            'id' => 'ship_shop',
            'value' => 'Nhận  tại cửa hàng',
            'time' => '1',
            'pay_allow' => '',
            'province_allow' => 'hcm',
        ),
        'ship_hcm' => array(
            'id' => 'ship_hcm',
            'value' => 'Ship Nội thành Sài Gòn',
            'time' => '1~2',
            'pay_allow' => '',
            'province_allow' => 'hcm',
        ),
        'ship_xe' => array(
            'id' => 'ship_xe',
            'value' => 'Gửi nhà xe',
            'time' => '1~2',
            'pay_allow' => '',
            'province_allow' => '',
        ),
        'ship_postnhanh' => array(
            'id' => 'ship_postnhanh',
            'value' => 'Gửi Chuyển phát nhanh',
            'time' => '1~2',
            'pay_allow' => '',
            'province_allow' => '',
        ),
        'ship_post' => array(
            'id' => 'ship_post',
            'value' => 'Gửi bưu phẩm',
            'time' => '5~7',
            'pay_allow' => '',
            'province_allow' => '',
        ),
    ),
    'payment' => array(
        'pay_tienmat' => array(
            'id' => 'pay_tienmat',
            'value' => 'Tiền mặt',
        ),
        'pay_chuyenkhoan' => array(
            'id' => 'pay_chuyenkhoan',
            'value' => 'Chuyển khoản ngân hàng',
        ),
        'pay_cod' => array(
            'id' => 'pay_cod',
            'value' => 'COD (thanh toán khi nhận bưu phẩm)',
        ),
    ),
);