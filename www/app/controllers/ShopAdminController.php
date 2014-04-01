<?php
use Myhelper\UploadHandler;

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
                $dbCat->laorder = $input['laorder'];
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
                        if ($input['id'] > 0) {
                            if (file_exists($destinationPath . '/' . $dbCat->laimage))
                                try{
                                    unlink($destinationPath . '/' . $dbCat->laimage);
                                }
                                catch(Exception $ex){}
                        }
                        $filename = trim(str_random(32) . '.' . ($ext));
                        $pathupload = $file->move($destinationPath, $filename);
                        if ($pathupload) {
                            $dbCat->find($id);
                            $dbCat->laimage = $filename;
                            $dbCat->save();
                            $flag = 'view';
                        } else {
                            $flag = 'create';
                        }
                    }
                } else {
                    $flag = 'create';
                }
            } catch (Exception $ex) {
                echo $ex;
            }
        }
        $cats = Category::getCategoriesTree();
        if ($flag == 'view') {
            $this->data['cats'] = Category::adminListCat($cats);
        } else {
            $this->data['cats'] = Category::adminSelectCat($cats, false, 0);
        }
        return View::make('admin/cat', $this->data);
    }

    public function getEditcat($id)
    {
        $dbCat = Category::find($id);
        $this->data['actCat'] = 'cat';
        $this->data['sidecat'] = 'create';
        $cats = Category::getCategoriesTree();
        if ($dbCat != null) {
            $this->data['catedit'] = $dbCat;
            $this->data['cats'] = Category::adminSelectCat($cats, false, $dbCat->laparent_id);
        } else {
            $this->data['catedit'] = null;
            $this->data['cats'] = Category::adminSelectCat($cats, false, 0);
        }
        return View::make('admin/cat', $this->data);
    }

    public function anyFactor($sidecat = "")
    {
        $this->data['actCat'] = 'factor';
        if ($sidecat != "")
            $this->data['sidecat'] = $sidecat;
        else $this->data['sidecat'] = 'view';
        $flag = $this->data['sidecat'];
        $input = Input::all();
        if (count($input) > 0) {
            try {
                if ($input['id'] == '')
                    $dbCat = new Factory();
                else {
                    $dbCat = Factory::find($input['id']);
                    if ($dbCat == null)
                        return Redirect::to('admin/factor');
                }
                $dbCat->latitle = $input['latitle'];
                $dbCat->laurl = $input['laurl'];
                $dbCat->lainfo = $input['lainfo'];
                $dbCat->laorder = $input['laorder'];
                $dbCat->save();

                $id = $dbCat->id;
                $flag = 'view';
                if ($id > 0) {
                    if (Input::hasFile('laimage')) {
                        $file = Input::file('laimage');
                        $destinationPath = 'uploads/factor/' . $id;

                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $ext = strtolower($file->getClientOriginalExtension());
                        if ($input['id'] > 0) {
                            if (file_exists($destinationPath . '/' . $dbCat->laimage))
                                unlink($destinationPath . '/' . $dbCat->laimage);
                        }
                        $filename = trim(str_random(32) . '.' . ($ext));
                        $pathupload = $file->move($destinationPath, $filename);
                        if ($pathupload) {
                            $dbCat->find($id);
                            $dbCat->laimage = $filename;
                            $dbCat->save();
                            $flag = 'view';
                        } else {
                            $flag = 'create';
                        }
                    }
                } else {
                    $flag = 'create';
                }
            } catch (Exception $ex) {
                echo $ex;
            }
        }

        if ($flag == 'view') {
            $cats = Factory::all();
            $this->data['cats'] = $cats;
        } else {
        }
        return View::make('admin/factor', $this->data);
    }

    public function getEditfactor($id)
    {
        $dbCat = Factory::find($id);
        $this->data['actCat'] = 'factor';
        $this->data['sidecat'] = 'create';
        if ($dbCat != null) {
            $this->data['catedit'] = $dbCat;
        } else {
            $this->data['catedit'] = null;
        }
        return View::make('admin/factor', $this->data);
    }


    public function anyProduct($sidecat = "")
    {
        $this->data['actCat'] = 'product';
//        if ($sidecat != "")
//            $this->data['sidecat'] = $sidecat;
//        else $this->data['sidecat'] = 'view';
        if ($sidecat == '') $sidecat = 'view';
        $flag = $sidecat;
        $input = Input::all();
        if (count($input) > 0 && isset($input['_token'])) {

            if ($input['id'] == '')
                $dbCat = new Product();
            else {
                $dbCat = Product::find($input['id']);
                if ($dbCat == null)
                    return Redirect::to('admin/product');
            }
            $dbCat->latitle = $input['latitle'];
            $dbCat->laurl = $input['laurl'];
            $dbCat->lakeyword = $input['lakeyword'];
            $dbCat->lashortinfo = $input['lashortinfo'];
            $dbCat->lauseguide = $input['lauseguide'];
            $dbCat->laoldprice = $input['laoldprice'];
            $dbCat->laprice = $input['laprice'];
            $dbCat->laamount = $input['laamount'];
            $dbCat->ladatenew = strtotime($input['ladatenew']);
            $dbCat->lainfo = $input['lainfo'];
            $dbCat->lacategory_id = $input['lacategory_id'];
            $dbCat->lakhoiluong = $input['lakhoiluong'];
            $dbCat->ladungtich = $input['ladungtich'];
            $dbCat->lachucnang = $input['lachucnang'];
            $dbCat->lavariant_id = $input['lavariant_id'];
            $dbCat->lamanufactor_id = $input['lamanufactor_id'];
            if(isset($input['ladeleted']) && $input['ladeleted']=='on')
                $dbCat->ladeleted = 0;
            else $dbCat->ladeleted = 1;
//            $v = $dbCat->validate($input);
            if ($input['latitle'] != '') {
                $dbCat->save();

                $id = $dbCat->id;
                $flag = 'view';
                if ($id > 0) {
                    $dbCat->find($id);
                    if(isset($input['laimage']))
                    $dbCat->laimage = $input['laimage'];
                    $dbCat->save();
                    for ($i = 0; $i <= $input['currmorepic']; $i++) {
                        if (isset($input['morepic' . $i]) && $input['morepic' . $i] != '' && $input['mprepictype' . $i] == 'new') {
                            $dbImg = new Image();
                            $dbImg->latitle = $input['morepictext' . $i];
                            $dbImg->lapic = $input['morepic' . $i];
                            $dbImg->laproduct_id = $id;
                            $dbImg->save();
                        }
                    }
                    $flag = 'view';
                }
            } else {
                $this->data['notice'] = 'Lỗi nhập liệu';
                $flag = 'create';
            }

        }
        $cats = Category::getCategoriesTree();
        $this->data['factors'] = Factory::adminSelectFactor();
        if ($flag == 'view') {
            $this->data['cats'] = Category::adminSelectCat($cats, true);
            $this->data['products'] = Product::adminViewProduct();
        } else {
//            $upload_handler = new UploadHandler\UploadHandler();
            $this->data['cats'] = Category::adminSelectCat($cats, true);
        }
        $this->data['sidecat'] = $flag;
        $this->data['variant'] = 0;
        return View::make('admin/product', $this->data);
    }

    public function getEditproduct($id,$variant=0)
    {
        $dbCat = Product::find($id);
        $this->data['actCat'] = 'product';
        $this->data['sidecat'] = 'create';
        $this->data['variant'] = $variant;
        $cats = Category::getCategoriesTree();
        if ($dbCat != null) {
            $this->data['catedit'] = $dbCat;
            $dbCat->ladatenew = date("d/m/Y", $dbCat->ladatenew);
            $this->data['cats'] = Category::adminSelectCat($cats, true, $dbCat->lacategory_id);
            $this->data['factors'] = Factory::adminSelectFactor($dbCat->lamanufactor_id);
            $this->data['morepics'] = Image::where('laproduct_id', '=', $dbCat->id)->get();
        } else {
            $this->data['catedit'] = null;
            $this->data['cats'] = Category::adminSelectCat($cats, true, 0);
            $this->data['factors'] = Factory::adminSelectFactor(0);

        }
        return View::make('admin/product', $this->data);
    }


    public function anyOrder()
    {
        $this->data['actCat'] = 'order';
        return View::make('admin/start', $this->data);
    }

    public function anyConfig()
    {
        $this->data['actCat'] = 'config';
        $input = Input::all();
        if (count($input) > 0 && isset($input['_token'])) {
            //save slider
            $db = Myconfig::where('lavar', '=', 'slide')->get();
            $count = $db->count();
            if ($count == 0) {
                $db = new Myconfig();
                $db->lavar = 'slide';
            }
            else{
                $first =  $db[0];
                $db = Myconfig::find($first->id);
            }
            $db->lavalue = $input['listpic'];
            $db->save();
            //save sidebar ads
            $db=null;
            $db = Myconfig::where('lavar', '=', 'sidebarads')->get();
            $count = $db->count();
            if ($count == 0) {
                $db = new Myconfig();
                $db->lavar = 'sidebarads';
            }
            else{
                $first =  $db[0];
                $db = Myconfig::find($first->id);
            }
            $db->lavalue = $input['sidebarads'];
            $db->save();

        }
        $this->data['slide'] = Myconfig::where('lavar', '=', 'slide')->get();
        $this->data['sidebarads'] = Myconfig::where('lavar', '=', 'sidebarads')->get();
        return View::make('admin/config', $this->data);
    }
}