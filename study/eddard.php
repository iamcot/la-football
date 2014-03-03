<?php
/**
 * Created by IntelliJ IDEA.
 * User: Truong
 * Date: 3/3/14
 * Time: 10:50 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Stark;
include "tully.php";
use Tully\Edmure as CoT;
class Eddard{
    public function out(){
      //  echo 'have name space';
        $edmure = new CoT();
        $edmure->out();
    }
}