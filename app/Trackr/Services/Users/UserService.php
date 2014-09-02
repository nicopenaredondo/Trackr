<?php namespace Trackr\Services\Users;

use App;
use Trackr\Services\Validation\UsersValidator as UserValidator;
use Trackr\Repository\Users\InterfaceUsersRepository as UserRepository;
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;
use Trackr\Repository\Attendances\InterfaceAttendancesRepository as AttendanceRepository;


class UserService
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
    if($this->validator->isValidForCreation($data)){
      return $this->user->create($data);
    }
  }

  public function errors(){
    return $this->validator->errors();
  }
}