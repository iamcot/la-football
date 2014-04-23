<?php
class Facebookuser extends Eloquent{

    protected $table = 'facebookuser';
    protected $fillable = array('facebookname','facebookid','gender','locale','username','fanpage_id',);

}