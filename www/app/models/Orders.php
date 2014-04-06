<?php
class Orders extends Eloquent{
    protected $table = 'laorders';

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