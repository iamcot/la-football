<?php
class Myconfig extends Eloquent{
    protected $table='laconfig';
    public static function buildSlider(){
        $slider = Myconfig::where('lavar','=','slide')->get();
        if(count($slider) > 0){
            $slider = $slider[0]->lavalue;
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
        else return null;

    }
    public static function buildSidebarads(){
        $arr = array();
        $slider = Myconfig::where('lavar','=','sidebarads')->get();
        if($slider->count()>0){
            $slider = $slider[0]->lavalue;
            $lines = explode("\n",$slider);
            $i=0;

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
        }

        return $arr;
    }

}