<?php

//repository
use Trackr\Repository\Users\InterfaceUsersRepository as UserRepository;
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;
//services
use Trackr\Services\Validation\UsersValidator as UserValidator;

class UsersController extends BaseController
{

	/**
	 * User Repository
	 *
	 * @param  \Trackr\Repository\Users\InterfaceUsersRepository
	 */
	protected $user;

	/**
	 * Department Repository
	 *
	 * @param  \Trackr\Repository\Departments\InterfaceDepartmentsRepository
	 */
	protected $department;

	/**
	 * User Validation Services
	 *
	 * @param  \Trackr\Services\Validation\UsersValidator
	 */
	protected $validator;

	public function __construct(UserRepository $user, DepartmentRepository $department, UserValidator $validator)
	{
		$this->user 			= $user;
		$this->department = $department;
		$this->validator 	= $validator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$listOfUsers = $this->user->make(['userProfile'])->paginate(12);
		return View::make('backend.users.index')
							->with('listOfUsers', $listOfUsers);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$listOfDepartments = $this->department->make(['jobs'])->get();
		return View::make('backend.users.create')
							->with('listOfDepartments', $listOfDepartments);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if($this->validator->isValidForCreation(Input::all())){
			DB::beginTransaction();
			if($this->user->create(Input::all())){
				DB::commit();
				Session::flash('success', 'You have successfully created a new user');
				return Redirect::route('users.index');
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to create a new user. Please try again later');
				return Redirect::route('users.index');
			}
		}else{
			return Redirect::route('users.create')
			              ->withErrors($this->validator->errors())
			              ->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$user = $this->user->find($id);
		$userProfile = $user->userProfile;
		return View::make('backend.users.show')
							->with('user', $user)
							->with('userProfile', $userProfile);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$user = $this->user->find($id);
		$userProfile = $user->userProfile;
		$listOfDepartments = $this->department->make(['jobs'])->get();
		return View::make('backend.users.edit')
							->with('user', $user)
							->with('userProfile', $userProfile)
							->with('listOfDepartments', $listOfDepartments);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		if($this->validator->isValidForUpdate(Input::all())){
			DB::beginTransaction();
			if($this->user->update($id, Input::all())){
				DB::commit();
				Session::flash('success', 'You have successfully updated this user');
				return Redirect::route('users.show', $id);
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to update this user. Please try again later');
				return Redirect::route('users.show', $id);
			}
		}else{
			return Redirect::route('users.edit', $id)
			              ->withErrors($this->validator->errors())
			              ->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$user = $this->user->find($id);
		$userProfile = $user->userProfile;
		if ($this->user->delete($user)) {
			Session::flash('success', 'You have successfully deleted "<strong>'. $userProfile['first_name'] .' '.$userProfile['last_name'].'</strong>"');
			return Redirect::route('users.index');
		}
			Session::flash('error', 'Failed to delete user "<strong>'. $userProfile['first_name'] .' '.$userProfile['last_name'].'</strong>"');
			return Redirect::route('users.index');
	}

}