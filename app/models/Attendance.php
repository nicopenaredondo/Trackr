<?php

class Attendance extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attendances';

	/**
	 * The primary key used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'attendance_id';

	/**
	 * The additional attribute to be merge in the collection
	 *
	 * @var array
	 */
	protected $appends = ['total_hours', 'status'];

	/**
	 * The fields that are allowed for mass assignment
	 * @var array
	 */
	protected $fillable = ['user_id', 'time_in', 'time_out'];

	public function users()
	{
		return $this->belongsTo('User','user_id');
	}

	public function getTotalHoursAttribute($value)
	{
		if($this->time_out != '0000-00-00'){
			$inHour 	 	= date('H', strtotime($this->time_in));
			$inMinute  	= date('i', strtotime($this->time_in));
			$inSeconds 	= date('s', strtotime($this->time_in));
			$inDate 		= \Carbon\Carbon::createFromTime($inHour, $inMinute, $inSeconds);

			$outHour 	 	= date('H', strtotime($this->time_out));
			$outMinute 	= date('i', strtotime($this->time_out));
			$outSeconds	= date('s', strtotime($this->time_out));
			$outDate 		= \Carbon\Carbon::createFromTime($outHour, $outMinute, $outSeconds);

			return $inDate->diffInHours($outDate);
		}else{
			return 'Not available yet';
		}
	}

	public function getTimeInAttribute($value)
	{
		return date('F j, Y h:i:s A', strtotime($value));
	}

	public function getTimeOutAttribute($value)
	{
		if(!is_null($value)){
			return date('F j, Y h:i:s A', strtotime($value));
		}else{
			return 'Not available yet';
		}
	}

	public function getStatusAttribute($value)
	{
		$inHour 	 	= date('H', strtotime($this->time_in));
		$inMinute  	= date('i', strtotime($this->time_in));
		$inSeconds 	= date('s', strtotime($this->time_in));
		$inDate = \Carbon\Carbon::createFromTime($inHour, $inMinute, $inSeconds);

		$outHour 	 	= date('H', strtotime($this->time_out));
		$outMinute 	= date('i', strtotime($this->time_out));
		$outSeconds	= date('s', strtotime($this->time_out));
		$outDate 		= \Carbon\Carbon::createFromTime($outHour, $outMinute, $outSeconds);

		$dateToday 	= date('Y-m-d', strtotime(\Carbon\Carbon::today()));
		$dateTimeIn = date('Y-m-d', strtotime($this->time_in));
		//check if there's no logout
		if($this->time_out == 'Not available yet'){
			//if the date is not current and there's no logout registered
			if ($dateToday != $dateTimeIn) {
				return 'Failed to logout';
			}else{
				return 'Present';
			}
		}

		if($inDate->diffInHours($outDate) > 9){
			return 'Regular';
		}else{
			return 'Undertime';
		}
	}
}