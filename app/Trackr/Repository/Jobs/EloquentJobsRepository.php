<?php namespace Trackr\Repository\Jobs;

use Illuminate\Database\Eloquent\Model;

use Trackr\Repository\EloquentBaseRepository;
use Trackr\Repository\Jobs\InterfaceJobsRepository;

class EloquentJobsRepository extends EloquentBaseRepository implements InterfaceJobsRepository
{
  /**
   * Eloquent model
   *
   * @var Illuminate\Database\Eloquent\Model
   */
  protected $job;

  public function __construct(Model $job)
  {
    parent::__construct($job);
    $this->job = $job;
  }
}