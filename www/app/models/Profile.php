<?php

class Profile extends Eloquent {
    protected $table = "lafacebookprofiles";
    public function user()
    {
        return $this->belongsTo('User');
    }
}