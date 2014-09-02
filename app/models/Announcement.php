<?php

class Announcement extends Eloquent
{

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'announcements';

  /**
   * The primary key used by the model.
   *
   * @var string
   */
  protected $primaryKey = 'announcement_id';

  /**
   * The fields that are allowed for mass assignment
   * @var array
   */
  protected $fillable = ['announcement_title', 'announcement_body'];

}