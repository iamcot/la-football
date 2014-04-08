<?php

class Profile extends Eloquent {
    protected $table = "lafacebookprofiles";
    protected $fillable = array('uid', 'username','laaccess_token');
    public function user()
    {
        return $this->belongsTo('User');
    }
}