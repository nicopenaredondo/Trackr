<?php namespace Trackr\Repository\Users;

interface InterfaceUsersRepository
{
	public function create($data);
	public function update($id, $data);
	public function getUsersByGroupId($groupId);
}