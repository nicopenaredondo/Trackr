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

	public function getAttendanceHistory($userId, $range = NULL)
	{
		if (is_null($range)) {
			# para makita ko din yung login ko ngayong araw. kaya endOfDay instead of startOfDay HiHiHi
			$startDay = Carbon::now()->endOfDay();
			return $this->attendance->where('time_in', '<=', $startDay);
		}
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

	public function updateAttendance($userId)
	{
		$startDay	= Carbon::now()->startOfDay();
		$endDay   = Carbon::now()->endOfDay();
		$attendanceData = $this->attendance->whereBetween('created_at',[$startDay, $endDay])
														           ->where('user_id', $userId)
														           ->first()
														           ->toArray();
		$attendance = $this->attendance->find($attendanceData['attendance_id']);
		$attendance->time_out = date('Y-m-d H:i:s');
		return $attendance->save();
	}

}