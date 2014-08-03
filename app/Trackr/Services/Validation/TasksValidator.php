<?php namespace Trackr\Services\Validation;

class TasksValidator extends Validator
{

	static $insertRules = [
		'task_name' 			 => 'required|max:140',
		'task_due_date'    => 'required|date'
	];

	static $updateRules = [
		'task_name' 			 => 'required|max:140',
		'task_due_date'    => 'required|date'
	];

}