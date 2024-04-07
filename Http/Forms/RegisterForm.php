<?php

namespace Http\Forms;

use Core\Validator;
use Http\Forms\Form;


class RegisterForm extends Form
{

  protected static $errors = [];
  public static function validate($name, $email, $password)
  {

    if (!Validator::string($name, 3, 20)) {
      static::$errors["name"] = "Please provide a real name, must be min 3 characters, and max 20 characters";
    }

    if (!Validator::string($email, 7, 255) || !Validator::email($email)) {
      static::$errors["email"] = "Please provide a valid email";
    }

    if (!Validator::string($password, 7, 255)) {
      static::$errors["password"] = "Please provide a password that has min 7 characters and max 255 characters";
    }

    return empty(static::$errors);
  }
}