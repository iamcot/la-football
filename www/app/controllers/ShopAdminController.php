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
    public function getCreatecat(){
        $this->data['actCat'] = 'cat';
        return View::make('admin/start',$this->data);
    }
}