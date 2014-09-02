<?php namespace Trackr\Services\Validation;

class AnnouncementsValidator extends Validator
{

  static $insertRules = [
    'announcement_title'  => 'required|max:128',
    'announcement_body'   => 'required|max:1000'
  ];

  static $updateRules = [
    'announcement_title'  => 'required|max:128',
    'announcement_body'   => 'required|max:1000'
  ];

}