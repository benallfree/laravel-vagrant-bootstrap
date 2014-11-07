<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends EloquentBase implements ConfideUserInterface
{
  use ConfideUser;
  use Timestampable;
  
  // Add your validation rules here
  public static $rules = [
    'age' => 'required|integer|between:18,99',
    'zip'=>'required',
    'gender' => 'required|integer|in:1,2,4',
    'seeking_gender'=>'required|integer|between:1,7',
    'seeking_age_min'=>'required|integer|between:18,99',
    'seeking_age_max'=>'required|integer|between:18,99',
    'seeking_proximity'=>'required|integer|between:0,100',
  ];
  
  protected $fillable = ['age', 'zip', 'gender', 'seeking_gender', 'seeking_age_min', 'seeking_age_max', 'seeking_proximity'];
  
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