<?php

class EloquentBase extends Eloquent
{
  protected function getDateFormat()
  {
      return 'U';
  }  
}
