<?php
class Product extends Eloquent
{
    protected $table = 'laproducts';
    public static function adminViewProduct(){
        return  DB::table('laproducts as p')
            ->leftJoin('lacategories as c', 'c.id', '=', 'p.lacategory_id')
            ->leftJoin('lamanufactors as f', 'p.lamanufactor_id', '=', 'f.id')
            ->select('p.*', 'c.latitle as catname', 'f.latitle as factorname')
            ->orderBy('id','DESC')
            ->paginate(Config::get('shop.tablepp'));
    }
    public function validate($input) {

        $rules = array(
            'latitle' => 'Required|Min:3|Max:100',
            'laurl' => 'Required|Unique:laproducts',
        );

        return Validator::make($input, $rules);
    }
    public static  function getVariants($id){
        return Product::where("lavariant_id","=",$id)
            ->where("ladeleted",'!=','1')
            ->get();
    }
    public static function getProductNews($id){
        return Product::where('laproduct_id','like',$id.',%')
            ->orwhere('laproduct_id','like','%,'.$id.',%')
            ->orwhere('laproduct_id','=','all')
            ->orwhere('laproduct_id','like','%,'.$id)->get();
    }
}