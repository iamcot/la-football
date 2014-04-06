<?php
class Orderitem extends Eloquent{
    protected $table = "laorderitems";
    public static function saveall($array){
        return DB::table('laorderitems')->insert($array);
    }
}