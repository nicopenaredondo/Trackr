<?php namespace Trackr\Services\Validation;

class UsersValidator extends Validator
{

	static $insertRules = [
		'username' => 'required|max:32',
		'password' => 'required|max:64'
	];

	static $updateRules = [
		'username' => 'required|max:32',
		'password' => 'required|max:64'
	];

}