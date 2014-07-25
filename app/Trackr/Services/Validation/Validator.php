<?php namespace Trackr\Services\Validation;

use Validator as V;

abstract class Validator
{

	protected $errors;

	public function check($validator)
	{

		if($validator->fails())
		{
			$this->errors = $validator->messages();
			return false;
		}

		return true;
 	}

 	public function isValidForCreation($input)
  {

    $validator = V::make($input, static::$insertRules);
    return $this->check($validator);

  }

  public function isValidForUpdate($input, $additionalRules = NULL)
  {

    $validator = V::make($input, static::$updateRules);
    return $this->check($validator);

  }

  public function isValidForLogin($input)
  {

  	$validator = V::make($input, static::$loginRules);
    return $this->check($validator);

  }

 	public function errors()
 	{
 		return $this->errors;
 	}


}