<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
  use ConfideUser;
  
  function is_profile_complete()
  {
    return false;
  }
}