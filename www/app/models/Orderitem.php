<?php
class Orderitem extends Eloquent{
    protected $table = "laorderitems";
    protected $fillable = array('order_id', 'product_id', 'latitle','amount','laprice','variantname','caturl','producturl','variantid','laimage','lakhoiluong');

    public static function saveall($array){
        return DB::table('laorderitems')->insert($array);
    }
}