<?php

class Task extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	/**
	 * The primary key used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'task_id';

	/**
	 * The fields that are allowed for mass assignment
	 * @var array
	 */
	protected $fillable = ['user_id', 'task_name', 'task_due_date', 'isDone'];

	/**
	 * The additional attribute to be merge in the collection
	 *
	 * @var array
	 */
	protected $appends = ['task_due_date_human'];

	public function users()
	{
		return $this->belongsTo('User');
	}

	public function getTaskDueDateHumanAttribute($value)
	{
		$date = Carbon::createFromFormat('Y-m-d H:i:s', $this->task_due_date);
		$dateNow = Carbon::today();
		if ($date > $dateNow) {
			# code...
			return $date->diffForHumans();
		}else if($date == $dateNow){
			return 'Today';
		}else{
			return date('F j, Y', strtotime($date));
		}

	}
}