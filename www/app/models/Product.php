<?php
class Product extends Eloquent
{
    protected $table = 'laproducts';
    public function category(){
        return  $this->hasOne("Category","id","lacategory_id");
    }
}