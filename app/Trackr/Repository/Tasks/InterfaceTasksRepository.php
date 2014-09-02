<?php namespace Trackr\Repository\Tasks;

interface InterfaceTasksRepository
{

  /**
   * Get the tasks today
   * @param  integer $userId - The id of the user
   * @return collection
   */
  public function today($userId);

  /**
   * Get the upcoming tasks
   * @param  integer $userId - The id of the user
   * @return collection
   */
  public function upcoming($userId);

  /**
   * Update the status of tasks
   * @param  integer $id - The id of the task
   * @return boolean
   */
  public function updateStatus($id);

  /**
   * Get all the tasks to show in the calendar
   * @param  integer $userId - The id of the user
   * @return json
   */
  public function getCalendarTasks($userId);
}