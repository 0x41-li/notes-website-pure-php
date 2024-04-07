<?php

namespace Http\Forms;

class Form
{
  protected static $errors = [];

  public static function errors()
  {
    return static::$errors;
  }

}