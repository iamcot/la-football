<?php
class Myconfig extends Eloquent{
    protected $table='laconfig';
    public static function buildSlider($slider){
        $lines = explode("\n",$slider);
        $i=0;
        $arr = array();
        foreach($lines as $line){
            if(trim($line)!=''){
                $items = explode("|",$line);
                if($items[0]!=''){
                    $arr[] = array(
                        'pic' => ((isset($items[0]))?$items[0]:''),
                        'title' =>((isset($items[1]))?$items[1]:''),
                        'link' =>((isset($items[2]))?$items[2]:''),
                    );
                }
            }
        }
        return $arr;
    }
}