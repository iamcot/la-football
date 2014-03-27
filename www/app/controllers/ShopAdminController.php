<?php
class ShopAdminController extends BaseController
{
    private $data = array(
        'typeEnd' => 'admin',
    );
    public function getIndex(){
        $this->data['actCat'] = 'home';
        return View::make('admin/start',$this->data);
    }
    public function anyCat($sidecat=""){
        $this->data['actCat'] = 'cat';
        if($sidecat!="")
            $this->data['sidecat'] = $sidecat;
        else $this->data['sidecat'] = 'view';

        $input = Input::all();
        if(count($input)>0){
                 $file = Input::file($input['laimage']);
                $destinationPath = 'uploads';
                $filename = str_random(12);
//                $upload_success = Input::upload($input['laimage'],$destinationPath,$filename);
                $upload_success = $file->move($destinationPath, $filename);
                if($upload_success){
                    echo Input::file($input['laimage'])->getRealPath();
                }


        }
        return View::make('admin/cat',$this->data);
    }
    public function anyProduct(){
        $this->data['actCat'] = 'product';
        return View::make('admin/start',$this->data);
    }
    public function anyOrder(){
        $this->data['actCat'] = 'order';
        return View::make('admin/start',$this->data);
    }
}