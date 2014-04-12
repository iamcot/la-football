<?php
namespace Myhelper\Readhtml;
class Readhtml{
    function getElement($content,$tag,$code,$attr){
        $queue = 0;
        $count = 0;
        $done = FALSE;
        $begin = 0;
        $end = strlen($content);
        if(($begin = strpos($content,$code.'="'.$attr.'"')) > 0){
            $begin = strpos($content,">",$begin) + 1;
            $queue ++;
        }
        else return "";
        $posK = $begin;

        while(!$done){
            $pos2t = strpos($content,"</".$tag,$posK);
            $pos1t = strpos($content,"<".$tag,$posK);

            if($pos1t < $pos2t){
                $queue++;
                $posK = $pos1t + 1;
            }
            else{
                $queue--;
                $posK = $pos2t + 1;
            }
            if($queue == 0){
                $done= TRUE;
                $end = $pos2t;
            }
            $count++;
            if($count>100) {
                $done = TRUE;
                $end = $pos2t;
            }
        }
        return substr($content,$begin,($end-$begin));
    }
}