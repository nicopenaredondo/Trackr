<?php

//repository
use Trackr\Repository\Users\InterfaceUsersRepository as UserRepository;
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;
use Trackr\Repository\Attendances\InterfaceAttendancesRepository as AttendanceRepository;

//services
use Trackr\Gateway\UserGateway;

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
   * Attendance Repository
   *
   * @param  \Trackr\Repository\Attendances\InterfaceAttendancesRepository
   */
  protected $attendance;

  /**
   * User Gateway
   *
   * @param  \Trackr\Gateway\UserGateway
   */
  protected $UserGateway;


  public function __construct(
    UserRepository $user,
    DepartmentRepository $department,
    AttendanceRepository $attendance,
    UserGateway $userGateway)
  {
    $this->user         = $user;
    $this->department   = $department;
    $this->attendance   = $attendance;
    $this->userGateway  = $userGateway;
    $this->beforeFilter('check-access');
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
    if (Input::has('query')) {
      # code...
      $listOfUsers = $this->user->searchByName(Input::get('query'))->get()->toArray();
      return View::make('backend.users.search', compact('listOfUsers'));
    }else{
      $listOfAdministrator  = $this->user->getUsersByGroupId(1);
      $listOfExecutive      = $this->user->getUsersByGroupId(2);
      $listOfEmployee       = $this->user->getUsersByGroupId(3);
      $listOfOjtIntern      = $this->user->getUsersByGroupId(4);

      $data = [
        'listOfAdministrator',
        'listOfExecutive',
        'listOfEmployee',
        'listOfOjtIntern'
      ];
      return View::make('backend.users.index', compact($data));
    }
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
    if($this->userGateway->create(Input::all())){
      Session::flash('success', 'You have successfully created a new user');
      return Redirect::route('users.index');
    }

    return Redirect::route('users.create')
                  ->with('error', 'Failed to create a new user. This incident will be reported')
                  ->withErrors($this->userGateway->errors())
                  ->withInput();
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
    $range['from'] = (Input::has('from')) ? Input::get('from') : NULL;
    $range['to']   = (Input::has('to')) ? Input::get('to') : NULL;

    $user               = $this->user->find($id);
    $userProfile        = $user->userProfile;
    $listOfAttendances  = $this->userGateway->getAttendanceHistory($id, $range);

    return View::make('backend.users.show')
              ->with('user', $user)
              ->with('userProfile', $userProfile)
              ->with('listOfAttendances', $listOfAttendances);
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
    if($this->userGateway->update($id, Input::all())){
      Session::flash('success', 'You have successfully updated this user');
      return Redirect::route('users.show', $id);
    }

    return Redirect::route('users.edit', $id)
                  ->with('error', 'Failed to update this user. This incident will be reported')
                  ->withErrors($this->userGateway->errors())
                  ->withInput();
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
    $userProfile = $this->user->find($id)->userProfile;
    if ($this->userGateway->delete($id)) {
      Session::flash('success', 'You have successfully deleted "<strong>'. $userProfile['first_name'] .' '.$userProfile['last_name'].'</strong>"');
      return Redirect::route('users.index');
    }
      Session::flash('error', 'Failed to delete user "<strong>'. $userProfile['first_name'] .' '.$userProfile['last_name'].'</strong>"');
      return Redirect::route('users.index');
  }

  /**
   * Reset the password of a specified user
   * GET /users/{id}/edit/reset-password
   * @param  int $id
   * @return Response
   */
  public function getResetPassword($id)
  {
    $rawPassword = Str::random(6);
    if ($this->userGateway->forgotPassword($id, $rawPassword)) {
      return Redirect::route('users.edit',$id)
                    ->with('success', 'Your new password is "<strong>'. $rawPassword .'</strong>"');
    }
  }

}