<?php namespace Trackr\Repository\Users;

interface InterfaceUsersRepository
{

  /**
   * Adds a new user
   * @param  array $data - The account and profile details of the user
   * @return boolean
   */
  public function create($data);

  /**
   * Updates the user
   * @param  integer $id   - The id of the user
   * @param  array   $data - The account and profile details of user
   * @return boolean
   */
  public function update($id, $data);

  /**
   * Get the users with the specified group id
   * @param  integer $groupId - The id of the group
   * @return array
   */
  public function getUsersByGroupId($groupId);

  /**
   * Search the name of the user
   * @param  string $query - The name of the user
   * @return array
   */
  public function searchByName($query);
}