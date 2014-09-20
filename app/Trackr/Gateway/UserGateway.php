<?php namespace Trackr\Gateway;

use App;
use DB;
use Carbon\Carbon;
use Trackr\Services\Validation\UsersValidator as UserValidator;
use Trackr\Repository\Users\InterfaceUsersRepository as UserRepository;
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;
use Trackr\Repository\Attendances\InterfaceAttendancesRepository as AttendanceRepository;


class UserGateway
{
   /**
   * Form Data
   *
   * @var array
   */
  protected $data;

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
   * User Validation Services
   *
   * @param  \Trackr\Services\Validation\UsersValidator
   */
  protected $validator;

  public function __construct(
    UserRepository $user,
    DepartmentRepository $department,
    AttendanceRepository $attendance,
    UserValidator $validator)
  {
    $this->user       = $user;
    $this->department = $department;
    $this->attendance = $attendance;
    $this->validator  = $validator;
  }

  public function create($data)
  {
    DB::beginTransaction();
    if($this->validator->isValidForCreation($data)){
      DB::commit();
      return $this->user->create($data);
    }
    DB::rollBack();
    return false;
  }

  public function update($id, $data)
  {
    DB::beginTransaction();
    if($this->validator->isValidForUpdate($data)){
      DB::commit();
      return $this->user->update($id, $data);
    }
    DB::rollBack();
    return false;
  }

  public function delete($id)
  {
    return $this->user->find($id)->delete();
  }

  public function forgotPassword($id, $rawPassword){
    $user = $this->user->find($id);
    $user->password = $rawPassword;
    $user->hadResetPassword = 1;

    if($user->save()){
      return true;
    }
    return false;
  }

  public function getAttendanceHistory($id, $range = NULL)
  {

    if (isset($range['from']) == true && isset($range['to']) == true) {
      $range['from'] = Carbon::createFromFormat('Y-m-d', $range['from'])->startOfDay();
      $range['to']   = Carbon::createFromFormat('Y-m-d', $range['to'])->endOfDay();
    }else{
      $range['from'] = Carbon::now()->startOfDay()->subWeek();
      $range['to']   = Carbon::now()->endOfDay();
    }
    return $this->attendance->getAttendanceHistory($id, $range)
                            ->orderBy('created_at','DESC')
                            ->paginate(15);
  }

  public function errors()
  {
    return $this->validator->errors();
  }
}