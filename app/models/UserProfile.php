<?php

class UserProfile extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'user_profile';

  /**
   * The primary key used by the model.
   *
   * @var string
   */
  protected $primaryKey = 'user_id';

  /**
   * The fields that are allowed for mass assignment
   * @var array
   */
  protected $fillable = [
    'first_name','last_name','birthday',
    'address','email','phone_number',
    'emergency_contact_number','emergency_contact_name',
    'job_id'
  ];

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function job()
  {
    return $this->belongsTo('Job');
  }
}