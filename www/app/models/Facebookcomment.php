<?php
class Facebookcomment extends Eloquent{
    protected $table = "lafacebookcomments";
    protected $fillable = array('lafullname','lacontent','laurl');
}