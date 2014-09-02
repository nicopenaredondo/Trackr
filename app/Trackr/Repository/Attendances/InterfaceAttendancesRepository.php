<?php namespace Trackr\Repository\Attendances;

interface InterfaceAttendancesRepository
{
  /**
   * Get the attendance of the users
   * @param  date $date - Specific date to get the attendance
   * @return collection
   */
  public function getAttendance($date = NULL);

  /**
   * Get the attendance history of a specific user
   * @param  integer  $userId - The id of the user
   * @param  array    $range  - Contains the "to" and "from" dates
   * @return collection
   */
  public function getAttendanceHistory($userId, $range);

  /**
   * Get the total hours of attendance
   * @param  integer $userId - the id of the user
   * @param  array   $range  - Contains the "to and "from" dates
   * @return integer
   */
  public function getAccumulatedHours($userId,$range);

  /**
   * Check if the user is currently logged in
   * @param  integer $userId - the id of the user
   * @return boolean
   */
  public function isLogin($userId);

  /**
   * Check if the user is already logged out
   * @param  integer $userId - the id of the user
   * @return boolean
   */
  public function isLogout($userId);

  /**
   * Create an attendance login for the current day
   * @param  integer $userId - the id of the user
   * @return boolean
   */
  public function attend($userId);

  /**
   * Update the attendance login for the current day.
   * @param  integer $userId - the id of the user
   * @param  array   $data   a- Contains the date time logout and remarks
   * @return boolean
   */
  public function updateAttendance($userId, $data);
}