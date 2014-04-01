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
        $this->data['rootcat'] = true;
        if($actCat->count()==1){
            if($actCat[0]->laparent_id>0){

                $lists = Vproduct::where('ladeleted','!=','1')
                    ->Where('cat1url','=',$cat);
                $input = Input::all();
                if (count($input) > 0 && isset($input['_token'])) {
                    if(isset($input['giatang']))
                        $lists->orderBy('laprice');
                    else if(isset($input['giagiam']))
                        $lists->orderBy('laprice','DESC');
                    else if(isset($input['tentang']))
                        $lists->orderBy('latitle');
                    else if(isset($input['tengiam']))
                        $lists->orderBy('latitle','DESC');
                }
                else{
                    $lists->orderBy('latitle');
                }

                $lists = $lists->paginate(Config::get('shop.tablepp'));
                $this->data['lists'] = $lists;
                $this->data['rootcat'] = false;
            }
            else {
                $catchildren = Category::where('laparent_id','=',$actCat[0]->id)
                    ->orderBy('latitle')
                    ->get();
                $this->data['catchildren'] = $catchildren;
                $this->data['oActCat'] =$actCat[0];
                $ranproduct = DB::table('v_products')
                    ->where('cat1id', '=', $actCat[0]->id)
                    ->orwhere('cat2id', '=', $actCat[0]->id)
                    ->orwhere('cat3id', '=', $actCat[0]->id)
                    ->orderBy(DB::raw('RAND()'))
                    ->take(6)
                    ->get();
                $this->data['lists'] = $ranproduct;
            }

        }

        return View::make(Config::get('shop.theme')."/list/list",$this->data);
    }
}