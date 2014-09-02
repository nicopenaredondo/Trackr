<?php

class Job extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'jobs';

  /**
   * The primary key used by the model.
   *
   * @var string
   */
  protected $primaryKey = 'job_id';

  /**
   * The fields that are allowed for mass assignment
   * @var array
   */
  protected $fillable = ['department_id','job_name', 'job_description'];

  public function department()
  {
    return $this->belongsTo('Department');
  }

  public function userProfile()
  {
    return $this->hasMany('UserProfile');
  }
}