<?php namespace Trackr\Handlers;

class UserEventHandler
{


	public function onAttendance($data)
	{

	}

	public function subscribe($events)
	{
		$events->listen('user.login','Stardibs\Handlers\UserEventHandler@onAttendance');
	}
}