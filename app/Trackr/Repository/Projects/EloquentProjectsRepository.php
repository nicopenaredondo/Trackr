<?php namespace Trackr\Repository\Projects;

use Illuminate\Database\Eloquent\Model;

use Trackr\Repository\EloquentBaseRepository;
use Trackr\Repository\Projects\InterfaceProjectsRepository;

class EloquentProjectsRepository extends EloquentBaseRepository implements InterfaceProjectsRepository
{
	/**
	 * Eloquent model
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $project;

	public function __construct(Model $project)
	{
		parent::__construct($project);
		$this->project = $project;
	}

	public function create($data)
	{
		$this->project->fill($data);
		if ($this->project->save()) {
			if (isset($data['users'])) {
				# code..
				$this->project->users()->sync($data['users']);
				return true;
			}
		}
		return false;
	}

	public function update($id,$data)
	{
		$project = $this->project->find($id);
		$project->fill($data);
		if ($project->save()) {
			if (isset($data['users'])) {
				# code..
				$project->users()->sync($data['users']);
				return true;
			}else{
				$project->users()->detach();
				return true;
			}
		}
		return false;
	}
}