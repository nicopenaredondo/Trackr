<?php namespace Trackr\Repository\Users;

use Illuminate\Database\Eloquent\Model;

use Trackr\Repository\EloquentBaseRepository;
use Trackr\Repository\Users\InterfaceUsersRepository;

class EloquentUsersRepository extends EloquentBaseRepository implements InterfaceUsersRepository
{
	/**
	 * Eloquent model
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $user;

	/**
	 * Eloquent model
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $userProfile;

	public function __construct(Model $user, Model $userProfile)
	{
		parent::__construct($user);
		$this->user 				= $user;
		$this->userProfile 	= $userProfile;
	}

	public function create($data){
		$user = $this->user->create($data);
		if($user) {
			$user->userProfile()->create($data);
			return true;
		}

		return false;
	}

	public function update($id, $data){
		$user = $this->user->findOrFail($id);
		$user->fill($data);
		if($user->save()) {
			$user->userProfile->fill($data)->save();
			return true;
		}

		return false;
	}
}