<?php namespace Trackr\Services\Validation;

class DepartmentsValidator extends Validator
{

  static $insertRules = [
    'department_name'        => 'required|max:32',
    'department_description' => 'required|max:1000'
  ];

  static $updateRules = [
    'department_name'        => 'required|max:32',
    'department_description' => 'required|max:1000'
  ];

}