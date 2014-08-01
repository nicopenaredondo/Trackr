<?php namespace Trackr\Repository\Attendances;

interface InterfaceAttendancesRepository
{
	public function whereUserId($userId);
	public function getAttendanceToday();
	public function getAttendanceHistory($userId, $range);
	public function getAccumulatedHours($userId,$range);
	public function isLogin($userId);
	public function isLogout($userId);
	public function attend($userId);
	public function updateAttendance($userId, $data);
}