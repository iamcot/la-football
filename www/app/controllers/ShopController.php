<?php

class ShopController extends BaseController
{
    private $data = array(
        'typeEnd' => 'shop',
        'haveHeader'=> 1,
        'sidebartype' => 'sright',  //sright - sleft - none

    );
    function __construct(){
        $tree = Category::getCategoriesTree();
        $this->data['cattree'] = Category::shopCatTree($tree);
    }
    public function getIndex(){
        $this->data['title'] = 'Thái Boutique';
        return View::make(Config::get('shop.theme')."/start/start",$this->data);
    }

}