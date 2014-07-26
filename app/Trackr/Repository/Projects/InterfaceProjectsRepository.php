<?php namespace Trackr\Repository\Projects;

interface InterfaceProjectsRepository
{
	public function create($data);
	public function update($id, $data);
}