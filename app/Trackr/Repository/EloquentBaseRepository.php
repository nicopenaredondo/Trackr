<?php namespace Trackr\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentBaseRepository
{

	/**
	 * Eloquent Model
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $model;

	/**
	 * Inject the model to instance
	 *
	 * @return void
	 */
	public function __construct($model = null)
	{
		$this->model = $model;
	}

	/**
	 * Returns all collection data handled by the model
	 *
	 * @return mixed
	 */
	public function all()
	{
		return $this->model->all();
	}

	/**
	 * Returns all collection data handled by the model
	 *
	 * @return mixed
	 */
	public function paginate($items = 5)
	{
		return $this->model->paginate($items);
	}

	/**
	 * Find a specific data handled by the model
	 *
	 * @param integer $id
	 * @param array $column
	 * @return mixed
	 *
	 */

	public function find($id, array $columns = array('*'))
	{
		return $this->model->findOrFail($id, $columns);
	}

	/**
	 * Create a new resource of this model
	 *
	 * @param 	array 		$data
	 * @return 	boolean
	 */
	public function create($data)
	{
		$model = $this->model->create($data);

		return $model;
	}

	/**
	 * Update a resource of this model
	 *
	 * @param   integer   $id
	 * @param 	array 		$data
	 * @return 	collection
	 */

	public function update($id, $data)
	{
		$model = $this->model->find($id);

		return $model->update($data);
	}

	/**
	 * Delete an existing data in the model
	 *
	 * @param collection $model
	 * @return mixed
	 *
	 */
	public function delete($model)
	{
		return ($model->delete()) ? true : false;
	}

	/**
	 * Find an entity by id
	 *
	 * @param int $id
	 * @param array $with
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function getById($id, array $with = array())
	{
	  $query = $this->make($with);

	  return $query->findOrFail($id);
	}

	/**
	 * Make a new instance of the entity to query on
	 *
	 * @param array $with
	 */
	public function make(array $with = array())
	{
	  return $this->model->with($with);
	}


	/**
	 * Search a data in the model
	 *
	 * @param string $query
	 * @param string $identifier
	 * @return mixed
	 */
	public function search($query, $identifier)
	{
		return $this->model->where($identifier, 'LIKE', '%'.$query.'%');
	}

	/**
	 * Counts all the row in the model
	 *
	 * @return mixed
	 */
	public function count()
	{
		return $this->all()->count();
	}

	/**
	 * Get the most recent record
	 *
	 * @param integer $count
	 * @return collection
	 */
	public function getRecentRecord($count)
	{
		return $this->model->orderBy('created_at', 'DESC')
		                   ->take($count)
		                   ->get();
	}



}