<?php namespace Trackr\Services\Validation;

class JobsValidator extends Validator
{

  static $insertRules = [
    'department_id'   => 'required|integer',
    'job_name'        => 'required|max:64',
    'job_description' => 'required|max:140'
  ];

  static $updateRules = [
    'department_id'   => 'required|integer',
    'job_name'        => 'required|max:64',
    'job_description' => 'required|max:140'
  ];

}