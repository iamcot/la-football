<?php
class Fanpage extends Eloquent{
    protected $table = 'fanpage';
    protected $fillable = array('pageid','pageusername','pagename','likes','category','about',);
}