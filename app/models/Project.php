<?php

class Project extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'projects';

  /**
   * The primary key used by the model.
   *
   * @var string
   */
  protected $primaryKey = 'project_id';

  /**
   * The fields that are allowed for mass assignment
   * @var array
   */
  protected $fillable = [
    'project_name',
    'project_contact_person',
    'project_contact_number',
    'project_status',
    'email_address',
    'date_initiated',
    'date_ended',
  ];

  public function users()
  {
    return $this->belongsToMany('UserProfile', 'project_user', 'project_id', 'user_id');
  }



}