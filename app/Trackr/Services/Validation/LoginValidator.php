<?php namespace Trackr\Services\Validation;

class LoginValidator extends Validator
{

  static $loginRules = [
    'username' => 'required',
    'password' => 'required'
  ];

}