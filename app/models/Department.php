<?php

class Department extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

	/**
	 * The primary key used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'department_id';

	/**
	 * The fields that are allowed for mass assignment
	 * @var array
	 */
	protected $fillable = ['department_name', 'department_description'];

	public function jobs()
	{
		return $this->hasMany('Job');
	}
}