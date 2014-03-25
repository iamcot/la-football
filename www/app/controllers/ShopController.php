<?php

class ShopController extends BaseController
{
    public function getIndex(){
        $data = array();
//        $data['title'] = 'Web mỹ phẩm';
//        $data['haveHeader'] = 0;
        return View::make("start",$data);
    }
    public function getProduct(){
        return 'product';
    }
}