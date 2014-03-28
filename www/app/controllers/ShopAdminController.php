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
                $dbCat = new Category();
                $dbCat->latitle = $input['latitle'];
                $dbCat->laurl = $input['laurl'];
                $dbCat->lainfo = $input['lainfo'];
                $dbCat->laparent_id = $input['laparent_id'];
                $dbCat->laorder = $input['laparent_id'];
                $dbCat->save();

                $id = $dbCat->id;
                if($id>0){
                    if(Input::hasFile('laimage')){
                        $file = Input::file('laimage');
                        $destinationPath = 'uploads/cat/'.$id;

                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $ext = strtolower($file->getClientOriginalExtension());
                        $filename = trim(str_random(32).'.'.($ext));
                        $pathupload = $file->move($destinationPath, $filename );
                        if($pathupload){
                            $dbCat->find($id);
                            $dbCat->laimage = $filename;
                            $dbCat->save();
                        }
                    }

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