<?php

return array(
    'title' => 'Webmypham.com',
    'pretitle' => '',
    'suftitle' => '- Mỹ phẩm, không đơn giản là kinh doanh',
    'treecatdeep' => 1,
    'tablepp'    =>  10,
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
);