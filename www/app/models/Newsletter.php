<?php
class NewsLetter extends Eloquent{
    protected $table = 'lanewsletter';
    protected $fillable = array('email','name');
}