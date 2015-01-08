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
        $actCat = Category::where("laurl",'=',$cat)->first();
        if($actCat){
            $this->data['crrCat'] = $actCat;
            $this->data['title'] =  $actCat->latitle;
            $this->data['description']=$actCat->lainfo;
            if($actCat->isnews == 1){
                $lists = Vproduct::where('ladeleted','!=','1')
                    ->Where('cat1url','=',$cat)
                    ->orWhere('cat2url','=',$cat)
                    ->orWhere('cat3url','=',$cat)
                    ->paginate(Config::get('shop.tablepp'));
                $this->data['lists'] = $lists;
                return View::make(Config::get('shop.theme')."/list/listnews",$this->data);

            }
            else {

                $lists = Vproduct::where('ladeleted','!=','1')
                    ->Where('cat1url','=',$cat)
                    ->orWhere('cat2url','=',$cat)
                    ->orWhere('cat3url','=',$cat);
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
                return View::make(Config::get('shop.theme')."/list/list",$this->data);
            }

        }
        else{
            App::abort(404);
        }

    }
    public function showsearch(){
        $searchkey = Input::get('search');
        $lists = Vproduct::where('latitle','like','%'.$searchkey.'%')
            ->orwhere('laurl','like','%'.$searchkey.'%')
            ->orwhere('lakeyword','like','%'.$searchkey.'%')
            ->orwhere('cat1name','like','%'.$searchkey.'%')
            ->orwhere('cat1url','like','%'.$searchkey.'%')
            ->orderBy('latitle')
            ->paginate(Config::get('shop.tablepp'));
        $this->data['title'] = 'Tìm kiếm '.$searchkey;
        $this->data['actCat'] = 'search';
        $this->data['caturl'] = 'search';
        $this->data['lists'] = $lists;
        $this->data['rootcat'] = false;
        $this->data['issearch'] = true;
        return View::make(Config::get('shop.theme')."/list/list",$this->data);
    }
    public function showtag($tag){
        $lists = Vproduct::where('factorurl','=',$tag)
            ->orwhere('lachucnang','like','%'.$tag.'%')
            ->orwhere('lakeyword','like','%'.$tag.'%')
            ->orderBy('latitle')
            ->paginate(Config::get('shop.tablepp'));
        $this->data['title'] = 'Tìm kiếm '.$tag;
        $this->data['actCat'] = 'search';
        $this->data['caturl'] = 'search';
        $this->data['lists'] = $lists;
        $this->data['rootcat'] = false;
        $this->data['issearch'] = true;
        return View::make(Config::get('shop.theme')."/list/list",$this->data);
    }
    public function showfav($type){
        if($type == 'moi-ve'){
            $lists = Vproduct::where('cat1url','!=','tin-tuc')
                ->where('ladatenew','>',time())
                ->orderBy('ladatenew','DESC')
                ->paginate(Config::get('shop.tablepp'));
        }
        else if($type == 'dang-hot'){
            $lists = Vproduct::where('cat1url','!=','tin-tuc')
                ->orderBy('numorder','DESC')
                ->orderBy('laview','DESC')
                ->paginate(Config::get('shop.tablepp'));
        }
        else if($type == 'dang-sale'){
            $lists = Vproduct::where('cat1url','!=','tin-tuc')
                ->where('pricechange','>','0')
                ->orderBy('pricechange','DESC')
                ->paginate(Config::get('shop.tablepp'));
        }
        else{
            App::abort(404);
        }
        $this->data['title'] = trans('common.'.$type);
        $this->data['actCat'] = $type;
        $this->data['caturl'] = $type;
        $this->data['lists'] = $lists;
        $this->data['rootcat'] = false;
        $this->data['issearch'] = true;
        return View::make(Config::get('shop.theme')."/list/list",$this->data);
    }
}