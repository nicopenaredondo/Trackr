<?php

//repository
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;
//services
use Trackr\Services\Validation\DepartmentsValidator as DepartmentValidator;

class DepartmentsController extends BaseController
{

	/**
	 * Department Repository
	 *
	 * @param  \Trackr\Repository\Departments\InterfaceDepartmentsRepository
	 */
	protected $department;

	/**
	 * Department Validation Services
	 *
	 * @param  \Trackr\Services\Validation\DepartmentsValidator
	 */
	protected $validator;

	public function __construct(DepartmentRepository $department, DepartmentValidator $validator)
	{
		$this->department = $department;
		$this->validator 	= $validator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /departments
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$listOfDepartments = $this->department->paginate(10);
		return View::make('backend.departments.index')
							->with('listOfDepartments', $listOfDepartments);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /departments/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('backend.departments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /departments
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if($this->validator->isValidForCreation(Input::all())){
			DB::beginTransaction();
			if($this->department->create(Input::all())){
				DB::commit();
				Session::flash('success', 'You have successfully created a new department');
				return Redirect::route('departments.index');
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to create a new department. Please try again later');
				return Redirect::route('departments.index');
			}
		}else{
			return Redirect::route('departments.create')
			              ->withErrors($this->validator->errors())
			              ->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /departments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$department = $this->department->find($id);
		return View::make('backend.departments.show')
							->with('department', $department);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /departments/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$department = $this->department->find($id);
		return View::make('backend.departments.edit')
							->with('department', $department);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /departments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		if($this->validator->isValidForUpdate(Input::all())){
			DB::beginTransaction();
			if($this->department->update($id, Input::all())){
				DB::commit();
				Session::flash('success', 'You have successfully updated this department');
				return Redirect::route('departments.show', $id);
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to update this department. Please try again later');
				return Redirect::route('departments.show', $id);
			}
		}else{
			return Redirect::route('departments.edit', $id)
			              ->withErrors($this->validator->errors())
			              ->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /departments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$department = $this->department->find($id);
		if ($this->department->delete($department)) {
			Session::flash('success', 'You have successfully deleted "<strong>'. $department['department_name'] .'</strong>"department');
			return Redirect::route('departments.index');
		}
			Session::flash('error', 'Failed to delete department "<strong>'. $department['department_name'] .'</strong>"department');
			return Redirect::route('departments.index');
	}

}