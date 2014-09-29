<?php namespace Trackr\Gateway;

use App;
use DB;

//repository
use Trackr\Repository\Jobs\InterfaceJobsRepository as JobRepository;
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;
//services
use Trackr\Services\Validation\JobsValidator as JobValidator;

class JobGateway
{
  /**
   * Form Data
   *
   * @var array
   */
  protected $data;

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

  public function __construct(
    JobRepository $job,
    DepartmentRepository $department,
    JobValidator $validator)
  {
    $this->job        = $job;
    $this->department = $department;
    $this->validator  = $validator;
  }

  public function create($data)
  {
    DB::beginTransaction();
    if($this->validator->isValidForCreation($data)){
      DB::commit();
      return $this->job->create($data);
    }
    DB::rollback();
    return false;
  }

  public function update($id, $data)
  {
    DB::beginTransaction();
    if($this->validator->isValidForUpdate($data)){
      DB::commit();
      return $this->job->update($id, $data);
    }
    DB::rollback();
    return false;
  }

  public function errors()
  {
    return $this->validator->errors();
  }
}