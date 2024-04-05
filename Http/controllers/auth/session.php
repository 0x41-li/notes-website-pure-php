<?php

use Core\App;
use Core\Auth;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\Validator;
use Http\Forms\LoginForm;

// Get the form suubmitted data
$email = Request::post("email");
$password = Request::post("password");

if (LoginForm::validate($email, $password)) {
  if (Auth::attempt($email, $password)) {
    Response::redirect("/notes");
  }

  Auth::addError("login", "Your credentiasl doesn't match our records");

  view("auth/login.view.php", [
    "errors" => Auth::errors()
  ]);

  exit();
}
