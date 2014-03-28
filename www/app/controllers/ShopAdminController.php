<?php
class ShopAdminController extends BaseController
{
    private $data = array(
        'typeEnd' => 'admin',
    );

    public function getIndex()
    {
        $this->data['actCat'] = 'home';
        return View::make('admin/start', $this->data);
    }

    public function anyCat($sidecat = "")
    {
        $this->data['actCat'] = 'cat';
        if ($sidecat != "")
            $this->data['sidecat'] = $sidecat;
        else $this->data['sidecat'] = 'view';
        $flag = $this->data['sidecat'];
        $input = Input::all();
        if (count($input) > 0) {
            try {
                if ($input['id'] == '')
                    $dbCat = new Category();
                else {
                    $dbCat = Category::find($input['id']);
                    if ($dbCat == null)
                        return Redirect::to('admin/cat');
                }
                $dbCat->latitle = $input['latitle'];
                $dbCat->laurl = $input['laurl'];
                $dbCat->lainfo = $input['lainfo'];
                $dbCat->laparent_id = $input['laparent_id'];
                $dbCat->laorder = $input['laparent_id'];
                $dbCat->save();

                $id = $dbCat->id;
                $flag = 'view';
                if ($id > 0) {
                    if (Input::hasFile('laimage')) {
                        $file = Input::file('laimage');
                        $destinationPath = 'uploads/cat/' . $id;

                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $ext = strtolower($file->getClientOriginalExtension());
                        $filename = trim(str_random(32) . '.' . ($ext));
                        $pathupload = $file->move($destinationPath, $filename);
                        if ($pathupload) {
                            $dbCat->find($id);
                            $dbCat->laimage = $filename;
                            $dbCat->save();
                            $flag = 'view';
                        }
                        else {
                            $flag = 'create';
                        }
                    }
                }
                else {
                    $flag = 'create';
                }
            }
            catch (Exception $ex) {
                echo $ex;
            }
        }
        $catdb = new Category();
        $cats = $catdb->treecat()->get();
        echo '<pre>';
        var_dump($cats);

//        if ($flag == 'view') {
//            $this->data['cats'] = $cats;
//        }
//        else {
//            $arrcat = array("0" => 'Thư mục gốc');
//            foreach ($cats as $cat) {
//                $arrcat[$cat->id] = $cat->latitle;
//            }
//            $this->data['cats'] = $arrcat;
//        }
//
//        return View::make('admin/cat', $this->data);
    }

    public function getEditcat($id)
    {
        $dbCat = Category::find($id);
        $this->data['actCat'] = 'cat';
        $this->data['sidecat'] = 'create';
        $cats = Category::all();
        $arrcat = array("0" => 'Thư mục gốc');
        foreach ($cats as $cat) {
            $arrcat[$cat->id] = $cat->latitle;
        }
        $this->data['cats'] = $arrcat;
        if ($dbCat != null) {
            $this->data['catedit'] = $dbCat;
        }
        else {
            $this->data['catedit'] = null;
        }
        return View::make('admin/cat', $this->data);
    }

    public function anyProduct()
    {
        $this->data['actCat'] = 'product';
        return View::make('admin/start', $this->data);
    }

    public function anyOrder()
    {
        $this->data['actCat'] = 'order';
        return View::make('admin/start', $this->data);
    }
}