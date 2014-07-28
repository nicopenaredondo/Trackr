<?php namespace Trackr\Handlers;

class AuthEventHandler
{

	public function onLogin($data)
	{

	}

	public function subscribe($events)
	{
		$events->listen('user.login','Stardibs\Handlers\AuthEventHandler@onLogin');
	}
}