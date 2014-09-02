<?php namespace Trackr\Services\Validation;

class ProjectsValidator extends Validator
{

  static $insertRules = [
    'project_name'            => 'required|max:64',
    'project_contact_person'  => 'required|max:128',
    'project_contact_number'  => 'required|max:32',
    'email_address'           => 'required|email',
    'date_initiated'          => 'required|date',
    'date_ended'              => 'required|date',
  ];

  static $updateRules = [
    'project_name'            => 'required|max:64',
    'project_contact_person'  => 'required|max:128',
    'project_contact_number'  => 'required|max:32',
    'email_address'           => 'required|email',
    'date_initiated'          => 'required|date',
    'date_ended'              => 'required|date',
  ];

}