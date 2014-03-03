<?php
/**
 * Created by IntelliJ IDEA.
 * User: Truong
 * Date: 3/3/14
 * Time: 10:50 PM
 * To change this template use File | Settings | File Templates.
 */
include "eddard.php";
class Eddard{
    public function out(){
        echo 'no name space';
    }
}

$eddard = new Stark\Eddard();
$eddard->out();