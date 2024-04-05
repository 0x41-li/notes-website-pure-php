<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
  protected static $errors = [];

  public static function validate($email, $password)
  {
    if (!Validator::string($email, 7, 255) || !Validator::email($email)) {
      static::$errors["email"] = "Please provide a valid email";
    }

    if (!Validator::string($password, 7, 255)) {
      static::$errors["password"] = "Please provide a password that has min 7 characters and max 255 characters";
    }

    return empty(static::$errors);
  }

  public static function errors()
  {
    return static::$errors;
  }

  // 
}
