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
            try{
                $file = Input::file('laimage');
                $destinationPath = 'uploads/cat';
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = str_random(32).'.'.($ext);
                $pathupload = $file->move($destinationPath, $filename );
                if($pathupload){
                    echo $filename;
                }
            }catch(Exception $ex){
                    echo $ex;

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