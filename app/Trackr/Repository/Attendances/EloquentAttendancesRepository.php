<?php namespace Trackr\Repository\Attendances;

use Illuminate\Database\Eloquent\Model;

use Trackr\Repository\EloquentBaseRepository;
use Trackr\Repository\Attendances\InterfaceAttendancesRepository;
use Carbon\Carbon;


class EloquentAttendancesRepository extends EloquentBaseRepository implements InterfaceAttendancesRepository
{
	/**
	 * Eloquent model
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $attendance;

	public function __construct(Model $attendance)
	{
		parent::__construct($attendance);
		$this->attendance = $attendance;
	}

	public function whereUserId($userId)
	{
		return $this->attendance->whereUserId($userId);
	}

	public function getAttendanceToday()
	{
		$startDay = Carbon::now()->startOfDay();
		$endDay   = Carbon::now()->endOfDay();
		return $this->attendance->whereBetween('time_in',[$startDay, $endDay]);
	}

	public function getAttendanceHistory($userId, $range)
	{
		return $this->attendance->whereBetween('time_in', [$range['from'], $range['to']])
														->where('user_id', $userId);
	}

	public function getAccumulatedHours($userId,$range)
	{
		$listOfAttendance = $this->attendance->select('time_in', 'time_out')
		                                     ->whereBetween('time_in', [$range['from'], $range['to']])
														             ->where('user_id', $userId)
														             ->get();

		$accumulatedHours = 0;
		foreach($listOfAttendance as $attendance)
		{
			$accumulatedHours += $attendance['total_hours'];
		}
		return $accumulatedHours;
	}

	public function isLogin($userId){
		$startDay = Carbon::now()->startOfDay();
		$endDay   = Carbon::now()->endOfDay();
		$hasLogin = $this->attendance->whereBetween('created_at',[$startDay, $endDay])
														     ->where('user_id', $userId)
														     ->count();
		if ($hasLogin == 1) {
			return true;
		}
			return false;
	}

	public function isLogout($userId){
		$startDay = Carbon::now()->startOfDay();
		$endDay   = Carbon::now()->endOfDay();
		$hasLogout = $this->attendance->whereBetween('time_out',[$startDay, $endDay])
														     ->where('user_id', $userId)
														     ->count();
		if ($hasLogout == 1) {
			return true;
		}
			return false;
	}

	public function attend($userId){
		$data = ['user_id' => $userId, 'time_in' => date('Y-m-d H:i:s')];
		return $this->attendance->create($data);
	}

	public function updateAttendance($userId, $data)
	{
		$startDay	= Carbon::now()->startOfDay();
		$endDay   = Carbon::now()->endOfDay();
		$attendanceData = $this->attendance->whereBetween('created_at',[$startDay, $endDay])
														           ->where('user_id', $userId)
														           ->first()
														           ->toArray();
		$attendance = $this->attendance->find($attendanceData['attendance_id']);
		$attendance->time_out = date('Y-m-d H:i:s');
		$attendance->remarks  = $data['remarks'];
		return $attendance->save();
	}

}