<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
  use ConfideUser;
  
  // Add your validation rules here
  public static $rules = [
    'age' => 'required',
    'zip'=>'required',
    'seeking_gender'=>'required',
    'seeking_age_min'=>'required',
    'seeking_age_max'=>'required',
    'seeking_proximity'=>'required',
  ];

  
  
  function is_profile_complete()
  {
    $rules = self::$rules;
    $data = [];
    foreach($rules as $k=>$v)
    {
      $data[$k] = $this->$k;
    }
    
		$validator = Validator::make($data, $rules);

		if ($validator->fails()) return false;
    return true;
  }
}