<?php

//repository
use Trackr\Repository\Projects\InterfaceProjectsRepository as ProjectRepository;
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;

//services
use Trackr\Services\Validation\ProjectsValidator as ProjectValidator;

class ProjectsController extends BaseController
{

	/**
	 * Project Repository
	 *
	 * @param  \Trackr\Repository\Projects\InterfaceProjectsRepository
	 */
	protected $project;

	/**
	 * Department Repository
	 *
	 * @param  \Trackr\Repository\Departments\InterfaceDepartmentsRepository
	 */
	protected $department;

	/**
	 * project Validation Services
	 *
	 * @param  \Trackr\Services\Validation\ProjectsValidator
	 */
	protected $validator;

	public function __construct(
		ProjectRepository $project,
		DepartmentRepository $department,
		ProjectValidator $validator
	)
	{
		$this->project 		= $project;
		$this->department = $department;
		$this->validator 	= $validator;
		//$this->beforeFilter('check-access');
	}


	/**
	 * Display a listing of the resource.
	 * GET /projects
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$listOfProjects = $this->project->paginate(12);
		return View::make('backend.projects.index')
							->with('listOfProjects', $listOfProjects);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /projects/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$listOfDepartments = $this->department->make(['jobs.userProfile'])->get()->toArray();
		return View::make('backend.projects.create')
							->with('listOfDepartments', $listOfDepartments);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /projects
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if($this->validator->isValidForCreation(Input::all())){
			DB::beginTransaction();
			if($this->project->create(Input::all())){
				DB::commit();
				Session::flash('success', 'You have successfully created a new project');
				return Redirect::route('projects.index');
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to create a new project. Please try again later');
				return Redirect::route('projects.index');
			}
		}else{
			return Redirect::route('projects.create')
			              ->withErrors($this->validator->errors())
			              ->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$project = $this->project->find($id);
		$users   = $project->users;
		return View::make('backend.projects.show')
							->with('project', $project)
							->with('users', $users);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /projects/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$listOfDepartments = $this->department->make(['jobs.userProfile'])->get();
		$project = $this->project->find($id);
		return View::make('backend.projects.edit')
							->with('project', $project)
							->with('listOfDepartments', $listOfDepartments);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		if($this->validator->isValidForCreation(Input::all())){
			DB::beginTransaction();
			if($this->project->update($id,Input::all())){
				DB::commit();
				Session::flash('success', 'You have successfully edited this project');
				return Redirect::route('projects.show', $id);
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to edit this project. Please try again later');
				return Redirect::route('projects.show', $id);
			}
		}else{
			return Redirect::route('projects.edit', $id)
			              ->withErrors($this->validator->errors())
			              ->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$project = $this->project->find($id);
		if ($project->delete($project)) {
			Session::flash('success', 'You have successfully deleted "<strong>'. $project['project_name'] .'</strong>"');
			return Redirect::route('projects.index');
		}
			Session::flash('error', 'Failed to delete project "<strong>'. $project['project_name'] .'</strong>"');
			return Redirect::route('projects.index');
	}

}