<?php
class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lauser';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('lapassword');
    public function profiles()
    {
        return $this->hasMany('Profile');
    }
}