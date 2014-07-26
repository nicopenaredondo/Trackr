<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The primary key used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'user_id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * The fields that are allowed for mass assignment
	 * @var array
	 */
	protected $fillable = ['username','password'];

	public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

	public function userProfile()
	{
		return $this->hasOne('UserProfile');
	}

	public function projects()
	{
		return $this->belongsToMany('Project', 'project_user', 'user_id', 'project_id');
	}

}
