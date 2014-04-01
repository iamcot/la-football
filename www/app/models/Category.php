<?php
class Category extends Eloquent
{
    protected $table = 'lacategories';

//        $sqltreecat = DB::table($this->table . ' as d')
//            ->leftJoin($this->table . ' as d1', 'd1.laparent_id', '=', 'd.id')
//            ->leftJoin($this->table . ' as d2', 'd2.laparent_id', '=', 'd1.id')
//            ->select('d.latitle as title', 'd1.latitle as title1', 'd2.latitle as title2')
//            ->where('d.laparent_id', '0')->get();

    public static function getCategoriesTree($id = 0, $path = '', $last_path = '')
    {
        $categories_array = array();

        $categories = Category::where('laparent_id', '=', $id)->get();

        $path .= $last_path . "/";

        foreach ($categories as $categorie) {
            $categories_array[$categorie->id] = array(
                'latitle' => $categorie->latitle,
                'id' => $categorie->id,
                'laurl' => $categorie->laurl,
                'laorder' => $categorie->laorder,
                'lainfo' => $categorie->lainfo,
                'laparent_id' => $categorie->laparent_id,
                'laicon' => $categorie->laicon,
                'laimage' => $categorie->laimage,
                'path' => $path . $categorie->latitle,

                'children' => array()
            );

            $categories_array[$categorie->id]['children'] = Category::getCategoriesTree($categorie->id, $path, $categorie->latitle);
        }

        return $categories_array;
    }

    public static function adminListCat($categories,$level=0)
    {
        $html = "";
        $sLevel = "";
        switch($level){
            case 0: $sLevel="";break;
            case 1: $sLevel="---";break;
            case 2: $sLevel="------";break;
            default: $sLevel="";break;
        }
        foreach ($categories as $cat) {
            $html .= "<tr>
                    <td>" . $cat['id'] . "</td>
                    <td>" . $sLevel . " " . link_to('admin/editcat/' . $cat['id'], $cat['latitle']) . "</td>
                    <td>" . $cat['laurl'] . "</td>
                    <td>" . str_limit($cat['lainfo'],40) . "</td>
                    <td class='imgthumb'>" . HTML::image('uploads/cat/' . $cat['id'] . '/' . $cat['laimage'], 'IMG') . "</td>
                    <td>" . $cat['laorder'] . "</td>
                </tr>";
            $html .= Category::adminListCat($cat['children'],$level+1);
        }

        return $html;
    }
    public static function adminSelectCat($categories,$full=false,$select=0,$level=0){
        $html="";
        if($level==0) $html = "<option value='0' ".(($select==0)?'selected':'').">Thư mục gốc</option>";
        $sLevel = "";
        switch($level){
            case 0: $sLevel="---";break;
            case 1: $sLevel="------";break;
            case 2: $sLevel="---------";break;
            default: $sLevel="";break;
        }
        foreach ($categories as $cat) {
            if($level < Config::get('shop.treecatdeep') || $full){
                $html .= "<option value='" . $cat['id'] . "'  ".(($select==$cat['id'])?'selected':'').">
                    " . $sLevel . " " .  $cat['latitle'] . "
                </option>";
                $html .= Category::adminSelectCat($cat['children'],$full,$select,$level+1);
            }

        }

        return $html;
    }
    public static function shopCatTree($categories,$level = 0){
        $html="<ul class='".(($level==0)?'menu':'')."'>";
        foreach ($categories as $cat) {
                $html .= "<li><a href='" . $cat['laurl'] . "' >
                    ".(($level==0)?'<i class="'.$cat['laicon'].'"></i>':'')." ". $cat['latitle'] . " <span>340</span>
            </a> </li>";
                $html .= Category::shopCatTree($cat['children'],$level+1);
        }
        $html.="</ul>";
        return $html;
    }

}