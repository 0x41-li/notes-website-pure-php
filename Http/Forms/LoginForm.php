<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
  protected $errors = [];

  public function validate($email, $password)
  {
    if (!Validator::string($email, 7, 255) || !Validator::email($email)) {
      $this->errors["email"] = "Please provide a valid email";
    }

    if (!Validator::string($password, 7, 255)) {
      $this->errors["password"] = "Please provide a password that has min 7 characters and max 255 characters";
    }

    return empty($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  }

  // 
}
