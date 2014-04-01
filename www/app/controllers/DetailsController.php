<?php
class DetailsController extends BaseController
{
    private $data = array(
        'typeEnd' => 'details',
        'haveHeader'=> 1,
        'title'=> 'Thái Boutique',
        'sidebartype' => 'sleft',  //sright - sleft - none

    );
    function __construct(){

    }
    public function showDetails($cat,$product){
        $this->data['oProduct'] = null;
        $product = Vproduct::where('laurl','=',$product)
            ->where('ladeleted','!=','1')
            ->get();
        if($product->count()>0){
            $this->data['oProduct'] = $product[0];
        }

        return View::make(Config::get('shop.theme')."/details/details",$this->data);
    }
}