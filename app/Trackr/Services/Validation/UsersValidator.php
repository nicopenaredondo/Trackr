<?php namespace Trackr\Services\Validation;

class UsersValidator extends Validator
{

  static $insertRules = [
    'username' => 'required|max:32',
    'password' => 'required|max:64',
    //'department_id' => 'required|integer',
    'group_id'      => 'required|integer',
    'job_id'        => 'required|integer',
    'first_name'    => 'required|max:64',
    'last_name'     => 'required|max:64',
    'birthday'      => 'required|date',
    'email'         => 'required|email',
    'address'       => 'required|max:1000',
    'phone_number'  => 'required|max:32',
    'emergency_contact_number' => 'required|max:32',
    'emergency_contact_name'   => 'required|max:64'
  ];

  static $updateRules = [
    //'department_id' => 'required|integer',
    'group_id'      => 'required|integer',
    'job_id'        => 'required|integer',
    'first_name'    => 'required|max:64',
    'last_name'     => 'required|max:64',
    'birthday'      => 'required|date',
    'email'         => 'required|email',
    'address'       => 'required|max:1000',
    'phone_number'  => 'required|max:32',
    'emergency_contact_number' => 'required|max:32',
    'emergency_contact_name'   => 'required|max:64'
  ];

}