<?php

class ShopController extends BaseController
{
    private $data = array(
        'typeEnd' => 'shop',
        'haveHeader'=> 1,

    );
    function __construct(){
        $tree = Category::getCategoriesTree();
        $this->data['cattree'] = Category::shopCatTree($tree);
    }
    public function getIndex(){
        $this->data['title'] = 'Thái Boutique';
        $sqlslide = Myconfig::where('lavar','=','slide')->get();
        $sqlslide = $sqlslide[0];
        $this->data['slider']= Myconfig::buildSlider($sqlslide->lavalue);
        return View::make(Config::get('shop.theme')."/start",$this->data);
    }

}