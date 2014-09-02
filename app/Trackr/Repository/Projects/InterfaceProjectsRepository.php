<?php namespace Trackr\Repository\Projects;

interface InterfaceProjectsRepository
{
  /**
   * Adds a new project
   * @param  array $data - contains the project detail and user involved
   * @return boolean
   */
  public function create($data);

  /**
   * Updates the specified project
   * @param  integer $id - The id of the project
   * @param  array $data - contains the project detail and user involved
   * @return boolean
   */
  public function update($id, $data);
}