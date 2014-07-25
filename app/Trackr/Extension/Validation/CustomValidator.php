<?php namespace Trackr\Extension\Validation;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
	/*public function validateCheckSubscription($attribute, $value, $parameters)
	{
		$subscriptionLength = ['Monthly','Semi-Monthly','Yearly'];
		if(in_array($value, $subscriptionLength)){
			return true;
		}
			return false;
	}*/
}