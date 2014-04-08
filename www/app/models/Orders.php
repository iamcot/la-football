<?php
class Orders extends Eloquent{
    protected $table = 'laorders';
    protected $fillable = array('uid','user_id','lashipping', 'lapayment', 'lasumkhoiluong','lafeeshipping','laordername','laordertel','laorderemail','laorderaddr','laorderprovince','laorderdistrict','sumsanpham','giamvoucher','voucher','laordernote');

    public static function getSumCartItem(){
        $sum = 0;
        if(Session::has('cart')){
            $cart = Session::get('cart');
            foreach($cart as $item){
                $sum += $item['amount'];
            }
        }
            return $sum;
    }
    public static function getSumPriceCart(){
        $sum = 0;
        if(Session::has('cart')){
            $cart = Session::get('cart');
            foreach($cart as $item){
                $sum += $item['laprice']*$item['amount'];
            }
        }
            return $sum;
    }
    public static function save1($array){
        return DB::table('laorders')->insertGetId($array);
    }

}