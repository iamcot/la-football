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
            $this->data['title'] =  $this->data['oProduct']->latitle.' - '.$this->data['oProduct']->cat1name;
            $this->data['description']=$this->data['oProduct']->lashortinfo;
            $this->data['keywords']=$this->data['oProduct']->lakeyword;
            $uproduct = Product::find($product[0]->id);
            $uproduct->laview += 1;
            $uproduct->save();
        }
        else{
            App::abort(404);
        }

        if($cat != 'tin-tuc')

        return View::make(Config::get('shop.theme')."/details/details",$this->data);
        else
        return View::make(Config::get('shop.theme')."/details/news",$this->data);
    }
}