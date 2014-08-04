<?php namespace Trackr\Repository\Tasks;

interface InterfaceTasksRepository
{
	public function create($data);
	public function today($userId);
	public function upcoming($userId);
	public function updateStatus($id);
	public function getCalendarTasks($userId);
}