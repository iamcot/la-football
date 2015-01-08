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
            ->first();
        if($product){
            $this->data['oProduct'] = $product;
            $this->data['title'] =  $this->data['oProduct']->latitle.' - '.$this->data['oProduct']->cat1name;
            $this->data['description']=$this->data['oProduct']->lashortinfo;
            $this->data['keywords']=$this->data['oProduct']->lakeyword;
            $uproduct = Product::find($product->id);
            $uproduct->laview += 1;
            $uproduct->save();
        }
        else{
            App::abort(404);
        }

        if($product->isnews == 0)
        return View::make(Config::get('shop.theme')."/details/details",$this->data);
        else
        return View::make(Config::get('shop.theme')."/details/news",$this->data);
    }
}