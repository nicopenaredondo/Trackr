<?php

//repository
use Trackr\Repository\Users\InterfaceUsersRepository as UserRepository;
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;
use Trackr\Repository\Attendances\InterfaceAttendancesRepository as AttendanceRepository;

//services
use Trackr\Services\Users\UserService;

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
   * User Service
   *
   * @param  \Trackr\Service\Users\UserService
   */
  protected $userService;


  public function __construct(
    UserRepository $user,
    DepartmentRepository $department,
    AttendanceRepository $attendance,
    UserService $userService)
  {
    $this->user         = $user;
    $this->department   = $department;
    $this->attendance   = $attendance;
    $this->userService  = $userService;
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
    if($this->userService->create(Input::all())){
      Session::flash('success', 'You have successfully created a new user');
      return Redirect::route('users.index');
    }

    return Redirect::route('users.create')
                    ->withErrors($this->userService->errors())
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

    if (Input::has('from') == true && Input::has('to') == true) {
      $range['from'] = Carbon::createFromFormat('Y-m-d', Input::get('from'))->startOfDay();
      $range['to']   = Carbon::createFromFormat('Y-m-d', Input::get('to'))->endOfDay();
    }else{
      $range['from'] = Carbon::now()->startOfDay()->subWeek();
      $range['to']   = Carbon::now()->endOfDay();
    }
    $listOfAttendances  = $this->attendance->getAttendanceHistory($id, $range)
                                           ->orderBy('created_at','DESC')
                                           ->paginate(15);
    $user               = $this->user->find($id);
    $userProfile        = $user->userProfile;
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
    //
    if($this->userService->update($id, Input::all())){
      Session::flash('success', 'You have successfully updated this user');
      return Redirect::route('users.show', $id);
    }

    return Redirect::route('users.edit', $id)
                    ->withErrors($this->userService->errors())
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
    $user = $this->user->find($id);
    $userProfile = $user->userProfile;
    if ($this->user->delete($user)) {
      Session::flash('success', 'You have successfully deleted "<strong>'. $userProfile['first_name'] .' '.$userProfile['last_name'].'</strong>"');
      return Redirect::route('users.index');
    }
      Session::flash('error', 'Failed to delete user "<strong>'. $userProfile['first_name'] .' '.$userProfile['last_name'].'</strong>"');
      return Redirect::route('users.index');
  }

  public function getResetPassword($id)
  {
    $rawPassword = Str::random(6);
    $user = User::find($id);
    $user->password = $rawPassword;
    $user->hadResetPassword = 1;
    if ($user->save()) {
      # code..
      return Redirect::route('users.edit',$id)
                    ->with('success', 'Your new password is "<strong>'. $rawPassword .'</strong>"');
    }
  }

}