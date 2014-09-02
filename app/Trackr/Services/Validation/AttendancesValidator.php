<?php namespace Trackr\Services\Validation;

class AttendancesValidator extends Validator
{

  static $insertRules = [
    'user_id' => 'required|integer',
    'time_in' => 'required|date',
  ];

  static $updateRules = [
    'user_id'   => 'integer',
    'time_in'   => 'required|date',
    'time_out'  => 'required|date'
  ];

}