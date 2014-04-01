<?php
class ListController extends  BaseController
{
    private $data = array(
        'typeEnd' => 'list',
        'haveHeader'=> 1,
        'title'=> 'Thái Boutique',
        'sidebartype' => 'sleft',  //sright - sleft - none

    );
    function __construct(){

    }
    public function showList($cat=""){
        $this->data['caturl'] = $cat;
        $this->data['lists'] = null;
        $actCat = Category::where("laurl",'=',$cat)->get();
        if($actCat->count()==1){
            if($actCat[0]->laparent_id>0){
                $lists = Vproduct::where('ladeleted','!=','1')
                    ->Where('cat1url','=',$cat)
                    ->orderBy('latitle')
                    ->paginate(Config::get('shop.tablepp'));
                $this->data['lists'] = $lists;
            }

        }

        return View::make(Config::get('shop.theme')."/list/list",$this->data);
    }
}