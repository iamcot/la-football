<?php
class ListController extends  BaseController
{
    private $data = array(
        'typeEnd' => 'shop',
        'haveHeader'=> 1,
        'title'=> 'Thái Boutique',
        'sidebartype' => 'sleft',  //sright - sleft - none

    );
    function __construct(){

    }
    public function anyIndex($cat=""){
        $data['url'] = $cat;
        return View::make(Config::get('shop.theme')."/list/list",$this->data);
    }
}