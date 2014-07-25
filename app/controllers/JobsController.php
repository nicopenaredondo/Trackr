<?php

//repository
use Trackr\Repository\Jobs\InterfaceJobsRepository as JobRepository;
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;
//services
use Trackr\Services\Validation\JobsValidator as JobValidator;

class JobsController extends BaseController
{

	/**
	 * Jobs Repository
	 *
	 * @param  \Trackr\Repository\Jobs\InterfaceJobsRepository
	 */
	protected $job;

	/**
	 * Department Repository
	 *
	 * @param  \Trackr\Repository\Department\InterfaceDepartmentRepository
	 */
	protected $department;

	/**
	 * Job Validation Services
	 *
	 * @param  \Trackr\Services\Validation\JobsValidator
	 */
	protected $validator;

	public function __construct(JobRepository $job, DepartmentRepository $department, JobValidator $validator)
	{
		$this->job 				= $job;
		$this->department = $department;
		$this->validator 	= $validator;
	}


	/**
	 * Display a listing of the resource.
	 * GET /jobs
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$listOfJobs = $this->job->make(['department'])->paginate(10);
		return View::make('backend.jobs.index')
							->with('listOfJobs', $listOfJobs);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /jobs/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$listOfDepartment = $this->department->all();
		return View::make('backend.jobs.create')
							->with('listOfDepartment', $listOfDepartment);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /jobs
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if($this->validator->isValidForCreation(Input::all())){
			DB::beginTransaction();
			if($this->job->create(Input::all())){
				DB::commit();
				Session::flash('success', 'You have successfully created a new job');
				return Redirect::route('jobs.index');
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to create a new job. Please try again later');
				return Redirect::route('jobs.index');
			}
		}else{
			return Redirect::route('jobs.create')
			              ->withErrors($this->validator->errors())
			              ->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /jobs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$job = $this->job->find($id);
		return View::make('backend.jobs.show')
							->with('job', $job);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /jobs/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$job = $this->job->find($id);
		$listOfDepartment = $this->department->all();
		return View::make('backend.jobs.edit')
							->with('listOfDepartment', $listOfDepartment)
							->with('job', $job);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /jobs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		if($this->validator->isValidForUpdate(Input::all())){
			DB::beginTransaction();
			if($this->job->update($id, Input::all())){
				DB::commit();
				Session::flash('success', 'You have successfully updated this job');
				return Redirect::route('jobs.show', $id);
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to update this job. Please try again later');
				return Redirect::route('jobs.show', $id);
			}
		}else{
			return Redirect::route('jobs.edit', $id)
			              ->withErrors($this->validator->errors())
			              ->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /jobs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$job = $this->job->find($id);
		if ($this->job->delete($job)) {
			Session::flash('success', 'You have successfully deleted "<strong>'. $job['job_name'] .'</strong>"');
			return Redirect::route('jobs.index');
		}
			Session::flash('error', 'Failed to delete job "<strong>'. $job['job_name'] .'</strong>"');
			return Redirect::route('departments.index');
	}

}